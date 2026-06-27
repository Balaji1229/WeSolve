@props(['faqs' => [], 'title' => 'Frequently Asked Questions'])

@php
    // Normalise: accept array of ['question'=>, 'answer'=>] and drop empty rows.
    $faqs = collect($faqs)
        ->map(fn ($f) => is_array($f) ? $f : (array) $f)
        ->filter(fn ($f) => trim($f['question'] ?? '') !== '' && trim($f['answer'] ?? '') !== '')
        ->values();
@endphp

@if($faqs->isNotEmpty())
<section class="py-16 lg:py-20 bg-body" aria-labelledby="faq-heading">
    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
        <h2 id="faq-heading" class="text-2xl lg:text-3xl font-bold text-primary mb-8 text-center" style="font-family: 'Space Grotesk', sans-serif;">
            {{ $title }}
        </h2>
        <div class="space-y-4">
            @foreach($faqs as $faq)
            <details class="group glass-card overflow-hidden">
                <summary class="flex cursor-pointer items-center justify-between gap-4 px-6 py-4 text-primary font-medium list-none">
                    <span>{{ $faq['question'] }}</span>
                    <svg class="h-5 w-5 flex-shrink-0 text-muted transition-transform duration-300 group-open:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </summary>
                <div class="px-6 pb-5 text-muted text-sm leading-relaxed">
                    {!! nl2br(e($faq['answer'])) !!}
                </div>
            </details>
            @endforeach
        </div>
    </div>
</section>

{!! \App\Helpers\SeoHelper::schemaFaq($faqs->all()) !!}
@endif
