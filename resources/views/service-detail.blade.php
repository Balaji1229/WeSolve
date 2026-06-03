@extends('layouts.app')

@section('title', $service->title . ' - Freelancers4U')

@section('content')
<section class="relative overflow-hidden bg-body pt-16 pb-20 lg:pt-24 lg:pb-28">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] -top-40 -right-40 animate-pulse-glow"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" data-aos="fade-up">
        <div class="text-center">
            <span class="tag mb-4">{{ $service->pricing_text ?? 'Service' }}</span>
            <h1 class="text-4xl lg:text-6xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
                {{ $service->title }}
            </h1>
            <p class="mt-6 text-lg text-secondary max-w-2xl mx-auto">
                {{ $service->description }}
            </p>
            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="btn-gradient">{{ $service->cta_button_text }}</a>
                <a href="{{ route('services') }}" class="btn-outline">All Services</a>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-24 lg:py-32 bg-body relative">
    <div class="bg-orb bg-orb-blue w-[400px] h-[400px] bottom-0 -left-20 animate-pulse-glow" style="animation-delay: 2s;"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                @if($service->image)
                <div class="rounded-2xl overflow-hidden">
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-80 object-cover" width="800" height="320" decoding="async">
                </div>
                @else
                <div class="glass-card p-12 flex items-center justify-center min-h-[300px]">
                    <div class="text-center">
                        <div class="text-6xl mb-4">🚀</div>
                        <h3 class="text-2xl font-bold gradient-text" style="font-family: 'Space Grotesk', sans-serif;">{{ $service->title }}</h3>
                    </div>
                </div>
                @endif
            </div>

            <div data-aos="fade-left">
                <h2 class="text-3xl font-bold text-primary mb-6" style="font-family: 'Space Grotesk', sans-serif;">
                    Why Choose Our {{ $service->title }}?
                </h2>
                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center">
                            <svg class="h-4 w-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <h4 class="text-primary font-medium">Expert Development Team</h4>
                            <p class="text-secondary text-sm">Experienced professionals delivering quality results.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center">
                            <svg class="h-4 w-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <h4 class="text-primary font-medium">Fast Turnaround</h4>
                            <p class="text-secondary text-sm">Quick delivery without compromising quality.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center">
                            <svg class="h-4 w-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <h4 class="text-primary font-medium">Ongoing Support</h4>
                            <p class="text-secondary text-sm">24/7 support and maintenance available.</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gradient-to-r from-indigo-500 to-purple-600 flex items-center justify-center">
                            <svg class="h-4 w-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <h4 class="text-primary font-medium">Affordable Pricing</h4>
                            <p class="text-secondary text-sm">Transparent pricing with no hidden costs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-24 lg:py-32 bg-body relative">
    <div class="bg-orb bg-orb-pink w-[400px] h-[400px] top-20 -right-40 animate-pulse-glow" style="animation-delay: 1s;"></div>

    <div class="relative mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center" data-aos="zoom-in">
        <span class="tag mb-4">Get Started</span>
        <h2 class="text-3xl lg:text-5xl font-bold text-primary mt-4 mb-6" style="font-family: 'Space Grotesk', sans-serif;">
            Ready to Start?
        </h2>
        <p class="text-secondary mb-10 max-w-2xl mx-auto">
            Let's discuss your project and create something amazing together. Get a free quote today.
        </p>
        <a href="{{ route('contact') }}" class="btn-gradient text-lg py-4 px-10">Get a Free Quote</a>
    </div>
</section>
@endsection
