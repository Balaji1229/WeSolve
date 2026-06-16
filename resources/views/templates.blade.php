@extends('layouts.app')

@section('title', 'Website Templates - WeSolve Technologies')

@section('content')
{{-- Hero Section --}}
<section class="relative overflow-hidden bg-body pt-16 pb-20 lg:pt-24 lg:pb-28">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] -top-40 -right-40 animate-pulse-glow"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <span class="tag mb-4">Our Designs</span>
        <h1 class="text-4xl lg:text-6xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
            Website <span class="gradient-text">Templates</span>
        </h1>
        <p class="mt-6 text-lg text-muted max-w-3xl mx-auto">
            Browse our professionally designed website templates. Find the perfect design for your business and let us customize it to match your brand.
        </p>
    </div>
</section>

<div class="section-divider"></div>

{{-- Templates Showcase --}}
<section class="py-16 lg:py-24 bg-body relative" aria-labelledby="templates-heading">
    <div class="bg-orb bg-orb-blue w-[400px] h-[400px] top-20 -left-20 animate-pulse-glow" style="animation-delay: 2s;"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 id="templates-heading" class="text-3xl lg:text-4xl font-bold text-primary" style="font-family: 'Space Grotesk', sans-serif;">
                Explore by Category
            </h2>
            <p class="mt-4 text-muted max-w-2xl mx-auto">
                Select a category to filter templates, or view all designs at once.
            </p>
        </div>

        {{-- Category Tabs --}}
        <div class="flex flex-wrap justify-center gap-2 mb-12" data-aos="fade-up" role="tablist" aria-label="Template categories">
            @foreach($categories as $index => $category)
                <button
                    type="button"
                    class="template-tab px-4 py-2 rounded-full text-sm font-medium transition-all duration-300 cursor-pointer {{ $index === 0 ? 'active bg-[#305CDE] text-white shadow-lg shadow-[#305CDE]/25' : 'bg-card text-muted hover:text-primary hover:border-theme-light border border-theme' }}"
                    data-category="{{ $category }}"
                    role="tab"
                    aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                    tabindex="{{ $index === 0 ? '0' : '-1' }}"
                >
                    {{ $category }}
                </button>
            @endforeach
        </div>

        {{-- Templates Grid --}}
        <div id="templates-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" data-aos="fade-up">
            @foreach($templates as $template)
                <article
                    class="template-card group cursor-pointer rounded-2xl glass-card-hover overflow-hidden border border-theme transition-all duration-300 hover:-translate-y-2 hover:shadow-2xl"
                    data-category="{{ $template->category }}"
                    tabindex="0"
                    role="button"
                    aria-label="Preview {{ $template->title }}"
                >
                    <figure class="relative aspect-[4/3] overflow-hidden bg-body m-0">
                        <img
                            src="{{ $template->imageUrl() }}"
                            alt="{{ $template->title }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                            loading="lazy"
                            decoding="async"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-4">
                            <span class="px-4 py-2 rounded-full bg-[#305CDE] text-white text-sm font-medium transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                Preview
                            </span>
                        </div>
                    </figure>

                    <div class="p-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-[#305CDE]/10 text-[#305CDE] border border-[#305CDE]/20">
                            {{ $template->category }}
                        </span>
                        <h3 class="mt-2 text-sm font-semibold text-primary truncate">{{ $template->title }}</h3>
                    </div>
                </article>
            @endforeach
        </div>

        {{-- Empty State --}}
        <div id="no-templates" class="hidden text-center py-16">
            <svg class="h-16 w-16 text-muted-light mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <h3 class="text-xl font-semibold text-primary mb-2">No templates found</h3>
            <p class="text-muted">Check back soon for new designs in this category.</p>
        </div>

        {{-- CTA --}}
        <div class="mt-16 text-center" data-aos="fade-up">
            <p class="text-muted mb-6">Want a custom website like one of these templates?</p>
            <a href="{{ route('contact') }}" class="btn-gradient inline-flex items-center justify-center">
                Request a Custom Design
            </a>
        </div>
    </div>
</section>

{{-- Fullscreen Modal --}}
<div id="template-modal" class="fixed inset-0 z-[100] hidden" role="dialog" aria-modal="true" aria-label="Template preview">
    {{-- Backdrop --}}
    <div id="modal-backdrop" class="absolute inset-0 bg-black/90 backdrop-blur-sm transition-opacity duration-300 opacity-0"></div>

    {{-- Close button --}}
    <button
        type="button"
        id="modal-close"
        class="absolute top-4 right-4 z-10 rounded-full bg-white/10 hover:bg-white/20 text-white p-2 transition-colors"
        aria-label="Close preview"
    >
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>

    {{-- Navigation buttons --}}
    <button
        type="button"
        id="modal-prev"
        class="absolute left-4 top-1/2 -translate-y-1/2 z-10 rounded-full bg-white/10 hover:bg-white/20 text-white p-3 transition-colors"
        aria-label="Previous template"
    >
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
    </button>

    <button
        type="button"
        id="modal-next"
        class="absolute right-4 top-1/2 -translate-y-1/2 z-10 rounded-full bg-white/10 hover:bg-white/20 text-white p-3 transition-colors"
        aria-label="Next template"
    >
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </button>

    {{-- Image container --}}
    <div class="relative w-full h-full flex items-center justify-center p-4 md:p-12">
        <img
            id="modal-image"
            src=""
            alt="Template preview"
            class="max-w-full max-h-full object-contain rounded-lg shadow-2xl transform scale-95 transition-all duration-300 opacity-0"
        >
    </div>

    {{-- Counter --}}
    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 text-white/80 text-sm font-medium">
        <span id="modal-current">1</span> / <span id="modal-total">1</span>
    </div>
</div>

@push('scripts')
<script>
(function () {
    const tabs = Array.from(document.querySelectorAll('.template-tab'));
    const cards = document.querySelectorAll('.template-card');
    const noTemplates = document.getElementById('no-templates');
    const modal = document.getElementById('template-modal');
    const modalBackdrop = document.getElementById('modal-backdrop');
    const modalImage = document.getElementById('modal-image');
    const modalClose = document.getElementById('modal-close');
    const modalPrev = document.getElementById('modal-prev');
    const modalNext = document.getElementById('modal-next');
    const modalCurrent = document.getElementById('modal-current');
    const modalTotal = document.getElementById('modal-total');

    let currentCategory = 'All';
    let visibleCards = Array.from(cards);
    let currentIndex = 0;
    let touchStartX = 0;
    let touchEndX = 0;

    function setActiveTab(activeTab) {
        tabs.forEach(t => {
            const isActive = t === activeTab;
            t.classList.toggle('active', isActive);
            t.classList.toggle('bg-[#305CDE]', isActive);
            t.classList.toggle('text-white', isActive);
            t.classList.toggle('shadow-lg', isActive);
            t.classList.toggle('shadow-[#305CDE]/25', isActive);
            t.classList.toggle('bg-card', !isActive);
            t.classList.toggle('text-muted', !isActive);
            t.classList.toggle('hover:text-primary', !isActive);
            t.classList.toggle('hover:border-theme-light', !isActive);
            t.classList.toggle('border', !isActive);
            t.classList.toggle('border-theme', !isActive);
            t.setAttribute('aria-selected', isActive ? 'true' : 'false');
            t.setAttribute('tabindex', isActive ? '0' : '-1');
        });
    }

    function filterTemplates(category) {
        currentCategory = category;
        visibleCards = [];

        cards.forEach((card, index) => {
            const cardCategory = card.dataset.category;
            const isMatch = category === 'All' || cardCategory === category;

            card.classList.toggle('hidden', !isMatch);

            if (isMatch) {
                card.style.animation = 'none';
                card.offsetHeight; // trigger reflow
                card.style.animation = 'fade-in-up 0.4s ease-out ' + (index % 8) * 0.05 + 's both';
                card.addEventListener('animationend', function handler() {
                    card.style.animation = '';
                    card.removeEventListener('animationend', handler);
                }, { once: true });
                visibleCards.push(card);
            }
        });

        noTemplates.classList.toggle('hidden', visibleCards.length > 0);
    }

    tabs.forEach((tab, index) => {
        tab.addEventListener('click', () => {
            setActiveTab(tab);
            filterTemplates(tab.dataset.category);
        });

        tab.addEventListener('keydown', (e) => {
            let nextIndex = index;
            if (e.key === 'ArrowRight' || e.key === 'ArrowDown') {
                e.preventDefault();
                nextIndex = (index + 1) % tabs.length;
            } else if (e.key === 'ArrowLeft' || e.key === 'ArrowUp') {
                e.preventDefault();
                nextIndex = (index - 1 + tabs.length) % tabs.length;
            } else if (e.key === 'Home') {
                e.preventDefault();
                nextIndex = 0;
            } else if (e.key === 'End') {
                e.preventDefault();
                nextIndex = tabs.length - 1;
            }

            if (nextIndex !== index) {
                tabs[nextIndex].focus();
                tabs[nextIndex].click();
            }
        });
    });

    function openModal(index) {
        if (visibleCards.length === 0) return;

        currentIndex = index;
        const card = visibleCards[currentIndex];
        const img = card.querySelector('img');

        modalImage.src = img.src;
        modalImage.alt = img.alt;
        modalTotal.textContent = visibleCards.length;
        modalCurrent.textContent = currentIndex + 1;

        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';

        requestAnimationFrame(() => {
            modalBackdrop.classList.remove('opacity-0');
            modalImage.classList.remove('scale-95', 'opacity-0');
            modalImage.classList.add('scale-100');
        });
    }

    function closeModal() {
        modalBackdrop.classList.add('opacity-0');
        modalImage.classList.remove('scale-100');
        modalImage.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.add('hidden');
            modalImage.src = '';
            document.body.style.overflow = '';
        }, 300);
    }

    function showImage(index) {
        if (visibleCards.length === 0) return;
        if (index < 0) index = visibleCards.length - 1;
        if (index >= visibleCards.length) index = 0;

        currentIndex = index;
        const card = visibleCards[currentIndex];
        const img = card.querySelector('img');

        modalImage.classList.add('opacity-0');
        setTimeout(() => {
            modalImage.src = img.src;
            modalImage.alt = img.alt;
            modalCurrent.textContent = currentIndex + 1;
            modalImage.classList.remove('opacity-0');
        }, 200);
    }

    cards.forEach((card) => {
        card.addEventListener('click', () => {
            const visibleIndex = visibleCards.indexOf(card);
            if (visibleIndex !== -1) {
                openModal(visibleIndex);
            }
        });

        card.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                card.click();
            }
        });
    });

    modalClose.addEventListener('click', closeModal);
    modalBackdrop.addEventListener('click', closeModal);

    modalPrev.addEventListener('click', (e) => {
        e.stopPropagation();
        showImage(currentIndex - 1);
    });

    modalNext.addEventListener('click', (e) => {
        e.stopPropagation();
        showImage(currentIndex + 1);
    });

    document.addEventListener('keydown', (e) => {
        if (modal.classList.contains('hidden')) return;
        if (e.key === 'Escape') closeModal();
        if (e.key === 'ArrowLeft') showImage(currentIndex - 1);
        if (e.key === 'ArrowRight') showImage(currentIndex + 1);
    });

    // Swipe support for mobile
    modal.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });

    modal.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    }, { passive: true });

    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;

        if (Math.abs(diff) <= swipeThreshold) return;
        showImage(diff > 0 ? currentIndex + 1 : currentIndex - 1);
    }
})();
</script>
@endpush
@endsection
