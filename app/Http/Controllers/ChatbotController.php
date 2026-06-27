<?php

namespace App\Http\Controllers;

use App\Models\ChatbotDocument;
use App\Models\Setting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatbotController extends Controller
{
    public function message(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:2000',
        ]);

        $userMessage = $validated['message'];

        if ($this->isGreeting($userMessage)) {
            return response()->json([
                'reply' => $this->greetingReply(),
                'fallback' => false,
                'sources' => [],
            ]);
        }

        $documents = $this->retrieveRelevantDocuments($userMessage);

        // Keyword retrieval is English-only, so non-English queries (e.g. Tamil)
        // match nothing. Fall back to the core high-value pages and let Gemini
        // judge relevance — it still returns OUT_OF_SCOPE for unrelated questions.
        if ($documents->isEmpty()) {
            $documents = $this->fallbackCoreDocuments();
        }

        if ($documents->isEmpty()) {
            return $this->outOfScopeResponse();
        }

        $context = $this->buildContext($documents);
        $result = $this->askGemini($userMessage, $context, $documents);

        return response()->json([
            'reply' => $result['reply'],
            'fallback' => $result['fallback'] ?? false,
            'sources' => $documents->map(fn ($doc) => [
                'title' => $doc->title,
                'url' => $doc->url,
            ])->filter(fn ($s) => filled($s['title']))->values(),
        ]);
    }

    private function retrieveRelevantDocuments(string $message)
    {
        $keywords = $this->extractKeywords($message);

        if (empty($keywords)) {
            return collect();
        }

        $documents = ChatbotDocument::all();

        $scored = $documents->map(function ($doc) use ($keywords) {
            $content = strtolower($doc->content . ' ' . $doc->title);
            $score = 0;

            foreach ($keywords as $keyword) {
                $count = substr_count($content, $keyword);
                $score += $count * $doc->weight;
            }

            return ['document' => $doc, 'score' => $score];
        });

        return $scored
            ->where('score', '>', 0)
            ->sortByDesc('score')
            ->take(5)
            ->pluck('document')
            ->values();
    }

    /**
     * Core high-value documents used when keyword retrieval finds nothing
     * (e.g. non-English queries). Highest-weight content first.
     */
    private function fallbackCoreDocuments()
    {
        return ChatbotDocument::whereIn('source', [
                'page:services', 'page:service', 'page:home', 'page:about',
                'page:contact', 'faq:page', 'faq:blog', 'page:escalation',
            ])
            ->orderByDesc('weight')
            ->take(6)
            ->get();
    }

    private function extractKeywords(string $message): array
    {
        $stopWords = [
            'a', 'an', 'the', 'is', 'are', 'was', 'were', 'be', 'been', 'being',
            'to', 'of', 'and', 'in', 'on', 'at', 'by', 'for', 'with', 'about',
            'as', 'into', 'through', 'during', 'before', 'after', 'above', 'below',
            'from', 'up', 'down', 'out', 'off', 'over', 'under', 'again', 'further',
            'then', 'once', 'here', 'there', 'when', 'where', 'why', 'how', 'all',
            'any', 'both', 'each', 'few', 'more', 'most', 'other', 'some', 'such',
            'no', 'nor', 'not', 'only', 'own', 'same', 'so', 'than', 'too', 'very',
            'can', 'will', 'just', 'should', 'now', 'do', 'does', 'did', 'have', 'has',
            'had', 'what', 'which', 'who', 'whom', 'this', 'that', 'these', 'those',
            'i', 'me', 'my', 'myself', 'we', 'our', 'ours', 'ourselves', 'you', 'your',
            'yours', 'yourself', 'yourselves', 'he', 'him', 'his', 'himself', 'she',
            'her', 'hers', 'herself', 'it', 'its', 'itself', 'they', 'them', 'their',
            'theirs', 'themselves', 'tell', 'give', 'want', 'know', 'like', 'would',
            'could', 'may', 'might', 'must', 'shall',
        ];

        $cleaned = preg_replace('/[^\p{L}\p{N}\s]/u', '', mb_strtolower($message));
        $words = preg_split('/\s+/', trim($cleaned));

        return collect($words)
            ->filter(fn ($word) => mb_strlen($word) > 2 && !in_array($word, $stopWords))
            ->unique()
            ->values()
            ->toArray();
    }

    private function buildContext($documents): string
    {
        $chunks = $documents->take(4)->map(function ($doc, $index) {
            $title = $doc->title ? "Title: {$doc->title}" : "Source: {$doc->source}";
            // Cap each document so the prompt stays lean and fast.
            $content = \Illuminate\Support\Str::limit(trim($doc->content), 1000);
            return "[Document " . ($index + 1) . "]\n{$title}\nURL: " . ($doc->url ?: 'N/A') . "\nContent:\n{$content}";
        });

        return $chunks->implode("\n\n---\n\n");
    }

    private function askGemini(string $userMessage, string $context, $documents): array
    {
        $apiKey = config('services.gemini.key');

        if (empty($apiKey)) {
            Log::error('Gemini API key is not configured.');
            return [
                'reply' => $this->buildFallbackReply($documents, 'The AI assistant is not configured.'),
                'fallback' => true,
            ];
        }

        $model = config('services.gemini.model', 'gemini-flash-latest');
        $maxTokens = (int) config('services.gemini.max_tokens', 1024);
        $temperature = (float) config('services.gemini.temperature', 0.2);

        $waNumber = $this->whatsappNumber();
        $waDisplay = $this->whatsappDisplayNumber() ?: 'our WhatsApp';
        $waLink = $waNumber ? "https://wa.me/{$waNumber}" : '';

        $systemPrompt = <<<PROMPT
You are "WeSolve Assistant" — the warm, professional AI assistant for WeSolve Technologies, a digital agency that builds websites, web apps, mobile apps, and provides AI, marketing, cloud, and design services.

YOUR MAIN GOAL:
- Your #1 goal is to turn this visitor into a customer for WeSolve.
- Be helpful and consultative, build trust, and guide the conversation toward starting a project with us.

YOUR JOB:
- First understand the WEBSITE CONTENT provided below, then answer the user using ONLY that content.
- Prioritise these topics, in this order: Services, Solutions, Company information, FAQs, and Contact details.
- Never invent prices, timelines, team details, services, or facts that are not in the WEBSITE CONTENT.

LEAD QUALIFICATION (do this naturally):
- After a greeting or a vague message, ask 1-2 short, friendly questions to understand their business and goal (e.g. type of business, what they want to build, timeline or budget range).
- Once you understand their need, recommend the most relevant WeSolve service and explain in 1-2 lines how it helps their business grow.
- Then invite them to take the next step by chatting with our developer on WhatsApp.

DEVELOPER WHATSAPP (share this to convert the user — use this EXACT format):
- Number: {$waDisplay}
- Link: {$waLink}
- When you invite the user to connect, write it like this on their own lines:
  📱 WhatsApp our developer: {$waDisplay}
  {$waLink}
- Share this whenever the user shows interest, asks to get started, asks about price/timeline, or when you cannot fully answer from the website content.

LANGUAGE:
- Reply in clear, professional English.
- If a user needs help in Tamil, let them know our developer can assist them directly in English or Tamil on WhatsApp.

GREETINGS & SMALL TALK:
- If the user greets you or makes small talk (e.g. "hi", "how are you", "thanks"), reply warmly and briefly, then ask what they would like to build so you can help. Do NOT treat greetings as out of scope.

RESPONSE FORMAT (very important — keep it clean and easy to read):
- Start with one short friendly sentence.
- When listing services, features, or steps, use bullet points with "- " at the start of each line.
- Use short bold section headings with **Heading** when it improves clarity.
- Keep paragraphs short (1-2 sentences) with blank lines between sections.
- Keep the whole reply concise and scannable. Avoid walls of text.
- Do NOT use markdown link syntax like [text](url). Write any URL as plain text, e.g. http://localhost/services

WHEN YOU CAN HELP:
- Appreciate the user's goal, then recommend the most relevant WeSolve service from the content.
- Mention a relevant page URL from the content when it helps.

BOUNDARIES:
- Only if the question is clearly unrelated to WeSolve / its services / the website content (e.g. weather, jokes, general trivia, coding help, other companies, spam), reply with exactly: OUT_OF_SCOPE
- If a specific answer is genuinely not in the WEBSITE CONTENT, reply with exactly: OUT_OF_SCOPE
- Never reply OUT_OF_SCOPE to a greeting or a normal question about WeSolve.

--- WEBSITE CONTENT ---

{$context}

--- END WEBSITE CONTENT ---
PROMPT;

        $payload = [
            'systemInstruction' => [
                'parts' => [
                    ['text' => $systemPrompt],
                ],
            ],
            'contents' => [
                [
                    'role' => 'user',
                    'parts' => [
                        ['text' => $userMessage],
                    ],
                ],
            ],
            'generationConfig' => [
                'maxOutputTokens' => $maxTokens,
                'temperature' => $temperature,
                // Disable "thinking" on Gemini 2.5 Flash models: it is much faster
                // and prevents the token budget being consumed by reasoning tokens
                // (which caused empty replies / timeouts on large prompts).
                'thinkingConfig' => [
                    'thinkingBudget' => 0,
                ],
            ],
        ];

        try {
            $endpoint = "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}";

            // Retry transient Gemini failures (429 rate limit, 500/503 overloaded).
            $attempts = 0;
            do {
                $response = Http::timeout(45)
                    ->withHeaders(['Content-Type' => 'application/json'])
                    ->post($endpoint, $payload);

                $attempts++;
                $transient = in_array($response->status(), [429, 500, 503], true);

                if ($transient && $attempts < 3) {
                    usleep(700000); // 0.7s backoff before retrying
                    continue;
                }

                break;
            } while (true);

            if ($response->failed()) {
                Log::error('Gemini API error', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                ]);

                return [
                    'reply' => $this->buildFallbackReply($documents, 'The AI assistant is temporarily unavailable.'),
                    'fallback' => true,
                ];
            }

            $text = $response->json('candidates.0.content.parts.0.text', '');
            $text = trim($text);

            if ($this->isOutOfScope($text)) {
                return [
                    'reply' => $this->whatsappFallbackMessage(),
                    'fallback' => true,
                ];
            }

            return [
                'reply' => $text ?: $this->whatsappFallbackMessage(),
                'fallback' => false,
            ];
        } catch (\Exception $e) {
            Log::error('Chatbot exception', ['error' => $e->getMessage()]);
            return [
                'reply' => $this->buildFallbackReply($documents, 'The AI assistant is temporarily unavailable.'),
                'fallback' => true,
            ];
        }
    }

    private function isOutOfScope(string $text): bool
    {
        $normalized = strtolower(preg_replace('/[^a-z0-9_]/i', '', $text));

        return str_contains($normalized, 'out_of_scope') ||
            str_contains(strtolower($text), 'i don\'t know') ||
            str_contains(strtolower($text), 'i do not know') ||
            str_contains(strtolower($text), 'not found in the content') ||
            str_contains(strtolower($text), 'not mentioned in the content');
    }

    private function isGreeting(string $message): bool
    {
        $cleaned = strtolower(trim(preg_replace('/[^a-z0-9\s]/i', '', $message)));

        if ($cleaned === '') {
            return false;
        }

        // Treat the message as a greeting only when EVERY word is a pleasantry,
        // so "hi how are you" is a greeting but "hi I need a website" is not.
        $pleasantryWords = [
            'hi', 'hello', 'hey', 'good', 'morning', 'afternoon', 'evening', 'day',
            'night', 'howdy', 'hola', 'namaste', 'vanakkam', 'greetings', 'yo', 'sup',
            'whats', 'what', 'up', 'how', 'are', 'you', 'doing', 'hows', 'is', 'it',
            'going', 'there', 'welcome', 'thanks', 'thank', 'u',
        ];

        $words = array_filter(explode(' ', $cleaned));

        return ! empty($words) && collect($words)->every(fn ($w) => in_array($w, $pleasantryWords, true));
    }

    private function greetingReply(): string
    {
        return "Hi 👋 Welcome to WeSolve Technologies! I'm your AI assistant, here to help you grow your business online.\n\nTo point you in the right direction — what kind of business do you run, and what are you looking to build? For example:\n- A new website for your business\n- A web or mobile app\n- SEO / digital marketing to get more customers\n\nTell me a little about your goal and I'll suggest the best way forward. 😊";
    }

    private function buildFallbackReply($documents, string $reason): string
    {
        if ($documents->isEmpty()) {
            return "{$reason} " . $this->whatsappFallbackMessage();
        }

        $reply = "{$reason} Here is some information from the website that may help:\n\n";
        $reply .= $documents->take(2)->map(fn ($doc) => strip_tags($doc->content))->implode("\n\n");

        $links = $documents->filter(fn ($doc) => filled($doc->url) && filled($doc->title))->take(3)->map(function ($doc) {
            return "- {$doc->title}: {$doc->url}";
        });

        if ($links->isNotEmpty()) {
            $reply .= "\n\nYou can also read more here:\n" . $links->implode("\n");
        }

        $reply .= "\n\n" . $this->whatsappFallbackMessage();

        return $reply;
    }

    private function outOfScopeResponse(): JsonResponse
    {
        return response()->json([
            'reply' => $this->whatsappFallbackMessage(),
            'fallback' => true,
            'sources' => [],
        ]);
    }

    private function whatsappFallbackMessage(): string
    {
        $number = $this->whatsappNumber();
        $display = $this->whatsappDisplayNumber();

        $base = "I'm sorry, I can only help with questions about WeSolve Technologies and our services. 😊\n\nFor this, please contact our developer directly — they'll be happy to help you in English or Tamil:";

        if (! empty($number)) {
            $base .= "\n\n📱 WhatsApp: {$display}\nhttps://wa.me/{$number}";
        }

        return $base;
    }

    private function whatsappNumber(): ?string
    {
        $number = Setting::get('contact_whatsapp');

        if (empty($number)) {
            return null;
        }

        return preg_replace('/[^0-9]/', '', $number);
    }

    /**
     * Human-readable WhatsApp number, e.g. "+91 6369443005".
     */
    private function whatsappDisplayNumber(): ?string
    {
        $digits = $this->whatsappNumber();

        if (empty($digits)) {
            return null;
        }

        // Indian numbers: country code 91 + a single space + the 10-digit number.
        if (str_starts_with($digits, '91') && strlen($digits) > 2) {
            return '+91 ' . substr($digits, 2);
        }

        return '+' . $digits;
    }
}
