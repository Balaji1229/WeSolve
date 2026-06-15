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

        $cleaned = preg_replace('/[^a-z0-9\s]/', '', strtolower($message));
        $words = preg_split('/\s+/', trim($cleaned));

        return collect($words)
            ->filter(fn ($word) => strlen($word) > 2 && !in_array($word, $stopWords))
            ->unique()
            ->values()
            ->toArray();
    }

    private function buildContext($documents): string
    {
        $chunks = $documents->map(function ($doc, $index) {
            $title = $doc->title ? "Title: {$doc->title}" : "Source: {$doc->source}";
            return "[Document " . ($index + 1) . "]\n{$title}\nURL: " . ($doc->url ?: 'N/A') . "\nContent:\n{$doc->content}";
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

        $systemPrompt = <<<PROMPT
You are "WeSolve" — the warm, friendly, and enthusiastic AI assistant for WeSolve Technologies, a digital agency that builds websites, web apps, mobile apps, and provides AI, marketing, cloud, and design services.

YOUR PERSONALITY:
- Greet users with genuine enthusiasm and make them feel valued.
- Be conversational, supportive, and never robotic.
- Show real interest in their business, ideas, and goals.
- Build trust and guide them toward choosing WeSolve as their digital partner.

HOW TO RESPOND:
- Base every answer on the WEBSITE CONTENT provided below. Do not make up prices, timelines, team details, or services that are not in the content.
- When a user shares a business need or goal, appreciate their vision and naturally recommend the most suitable WeSolve service.
  Examples:
  - "I want to sell products online" → praise their idea and confidently pitch e-commerce website development, mentioning custom storefronts, secure payments, and mobile-first design.
  - "I need a mobile app" → recommend mobile app development with iOS/Android support, secure login, and backend integration.
  - "I want to grow my business" → suggest digital marketing, SEO, and a professional website.
  - "I need something custom" → recommend web application development with dashboards, automation, and scalable architecture.
- Keep replies concise (3-5 sentences), friendly, and helpful.
- Mention relevant page links from the content when it helps the user.

BOUNDARIES:
- If the user's question is completely unrelated to WeSolve, our services, or the website content (e.g., weather, jokes, general trivia, coding help), reply with exactly: OUT_OF_SCOPE
- If you truly cannot answer from the website content, reply with exactly: OUT_OF_SCOPE

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
            ],
        ];

        try {
            $response = Http::timeout(60)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                ])
                ->post("https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$apiKey}", $payload);

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
        $greetings = [
            'hi', 'hello', 'hey', 'good morning', 'good afternoon', 'good evening',
            'howdy', 'hola', 'namaste', 'vanakkam', 'greetings', 'yo', 'hi there',
            'hello there', 'hey there', 'good day', 'what\'s up', 'sup',
        ];

        $cleaned = strtolower(trim(preg_replace('/[^a-z0-9\s]/i', '', $message)));

        return in_array($cleaned, $greetings);
    }

    private function greetingReply(): string
    {
        return "Hey there! Welcome to WeSolve Technologies — I\'m so glad you stopped by. 😊\n\nI\'d love to learn about your business and help you grow online. Are you looking to build a website, launch an app, boost your marketing, or explore AI solutions? Tell me a bit about what you have in mind!";
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

        if (empty($number)) {
            return 'Sorry, I can only answer questions based on our website content. For other questions, please connect with our developer on WhatsApp.';
        }

        return "Sorry, I can only answer questions based on our website content. For this question, please connect with our developer on WhatsApp: https://wa.me/{$number}";
    }

    private function whatsappNumber(): ?string
    {
        $number = Setting::get('contact_whatsapp');

        if (empty($number)) {
            return null;
        }

        return preg_replace('/[^0-9]/', '', $number);
    }
}
