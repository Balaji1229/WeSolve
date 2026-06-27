{{-- Reusable repeatable FAQ editor (vanilla JS, no Alpine dependency).
     Expects $faqs = array of ['question' => ..., 'answer' => ...] (may be null). --}}
@php
    $existingFaqs = collect(old('faqs', $faqs ?? []))
        ->map(fn ($f) => is_array($f) ? $f : (array) $f)
        ->filter(fn ($f) => trim($f['question'] ?? '') !== '' || trim($f['answer'] ?? '') !== '')
        ->values();
@endphp

<div>
    <div class="flex items-center justify-between mb-2">
        <label class="block text-sm font-medium text-secondary">FAQs <span class="text-muted font-normal">(for FAQ schema)</span></label>
        <button type="button" id="faq-add-btn" class="text-xs btn-outline px-3 py-1.5">+ Add FAQ</button>
    </div>
    <p class="text-xs text-muted mb-3">Add question/answer pairs based on real user search intent. These render as an accordion and emit FAQPage structured data.</p>

    <div id="faq-list" class="space-y-4">
        @foreach($existingFaqs as $faq)
        <div class="faq-row glass-card p-4 space-y-3">
            <div class="flex items-center justify-between">
                <span class="text-xs font-medium text-muted">FAQ</span>
                <button type="button" class="faq-remove-btn text-xs text-red-500 hover:text-red-400">Remove</button>
            </div>
            <input type="text" name="faqs[][question]" value="{{ $faq['question'] ?? '' }}" placeholder="Question" class="w-full rounded-xl input-bg px-4 py-2.5 text-sm text-primary focus:outline-none focus:border-[#305CDE]/50 transition">
            <textarea name="faqs[][answer]" rows="2" placeholder="Answer" class="w-full rounded-xl input-bg px-4 py-2.5 text-sm text-primary focus:outline-none focus:border-[#305CDE]/50 transition">{{ $faq['answer'] ?? '' }}</textarea>
        </div>
        @endforeach
    </div>

    {{-- Template for new rows --}}
    <template id="faq-row-template">
        <div class="faq-row glass-card p-4 space-y-3">
            <div class="flex items-center justify-between">
                <span class="text-xs font-medium text-muted">FAQ</span>
                <button type="button" class="faq-remove-btn text-xs text-red-500 hover:text-red-400">Remove</button>
            </div>
            <input type="text" name="faqs[][question]" placeholder="Question" class="w-full rounded-xl input-bg px-4 py-2.5 text-sm text-primary focus:outline-none focus:border-[#305CDE]/50 transition">
            <textarea name="faqs[][answer]" rows="2" placeholder="Answer" class="w-full rounded-xl input-bg px-4 py-2.5 text-sm text-primary focus:outline-none focus:border-[#305CDE]/50 transition"></textarea>
        </div>
    </template>
</div>

@push('scripts')
<script>
(function () {
    const list = document.getElementById('faq-list');
    const tpl = document.getElementById('faq-row-template');
    const addBtn = document.getElementById('faq-add-btn');
    if (!list || !tpl || !addBtn) return;

    addBtn.addEventListener('click', function () {
        list.appendChild(tpl.content.cloneNode(true));
    });

    list.addEventListener('click', function (e) {
        if (e.target.classList.contains('faq-remove-btn')) {
            const row = e.target.closest('.faq-row');
            if (row) row.remove();
        }
    });
})();
</script>
@endpush
