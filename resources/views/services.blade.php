@extends('layouts.app')

@section('title', 'Our Services - WeSolve Technologies')

@section('content')
<section class="relative overflow-hidden bg-body pt-16 pb-20 lg:pt-24 lg:pb-28">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] -top-40 -right-40 animate-pulse-glow"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <span class="tag mb-4">Our Services</span>
        <h1 class="text-4xl lg:text-6xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
            What We <span class="gradient-text">Offer</span>
        </h1>
        <p class="mt-6 text-lg text-muted max-w-2xl mx-auto">
            Affordable solutions for your digital needs
        </p>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-24 lg:py-32 bg-body relative">
    <div class="bg-orb bg-orb-blue w-[400px] h-[400px] bottom-0 -left-20 animate-pulse-glow" style="animation-delay: 2s;"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($services as $index => $service)
            <div class="glass-card-hover p-8 flex flex-col" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-[#305CDE]/20 to-[#00B6DA]/20 border border-[#305CDE]/20 mb-6">
                    <span class="text-xl font-bold gradient-text">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                </div>
                <h2 class="text-xl font-semibold text-primary mb-3" style="font-family: 'Space Grotesk', sans-serif;">{{ $service->title }}</h2>
                <p class="text-muted text-sm leading-relaxed flex-1">{{ $service->description }}</p>
                @if($service->pricing_text)
                <p class="mt-4 gradient-text font-medium text-sm">{{ $service->pricing_text }}</p>
                @endif
                <a href="{{ route('contact') }}" class="mt-6 btn-gradient text-sm py-2.5 px-6 text-center">
                    {{ $service->cta_button_text }}
                </a>
            </div>
            @empty
            <div class="col-span-3 text-center py-20">
                <div class="text-5xl mb-4">📋</div>
                <p class="text-muted text-lg">No services available at the moment.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
