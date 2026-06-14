@extends('layouts.app')

@section('title', 'About Us - WeSolve Technologies')

@section('content')
{{-- Hero --}}
<section class="relative overflow-hidden bg-body pt-16 pb-20 lg:pt-24 lg:pb-28">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] -top-40 -right-40 animate-pulse-glow"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <span class="tag mb-4">About Us</span>
        <h1 class="text-4xl lg:text-6xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
            About <span class="gradient-text">WeSolve Technologies</span>
        </h1>
        <p class="mt-6 text-lg text-muted max-w-2xl mx-auto">
            Your trusted partner for affordable digital solutions
        </p>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-16 lg:py-24 bg-body relative">
    <div class="bg-orb bg-orb-blue w-[400px] h-[400px] top-20 -left-20 animate-pulse-glow" style="animation-delay: 2s;"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <span class="tag mb-4">About Us</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4 mb-6" style="font-family: 'Space Grotesk', sans-serif;">
                    Who We Are
                </h2>
                <p class="text-muted leading-relaxed mb-4">
                    <strong class="text-primary">WeSolve Technologies</strong> is a leading digital agency based in India, specializing in <strong class="text-primary">affordable website development</strong>, <strong class="text-primary">custom mobile app development</strong>, and result-driven <strong class="text-primary">SEO services</strong>. We help startups, small businesses, and enterprises build a powerful digital presence without breaking the bank.
                </p>
                <p class="text-muted leading-relaxed mb-6">
                    Our team of expert developers, designers, and SEO specialists brings together years of hands-on experience in Laravel, React, Flutter, and modern web technologies. From e-commerce platforms and booking systems to corporate websites and cross-platform mobile apps — we deliver high-quality, scalable solutions tailored to your business goals.
                </p>

            </div>
            <div class="relative" data-aos="fade-left">
                <div class="glass-card p-2 overflow-hidden">
                    <img src="{{ asset('images/about-us.jpg') }}" alt="WeSolve Technologies - Affordable Website and App Development Company India" class="w-full h-auto rounded-xl object-cover" loading="lazy" width="600" height="400">
                </div>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-24 lg:py-32 bg-body relative">
    <div class="bg-orb bg-orb-pink w-[400px] h-[400px] bottom-0 right-0 animate-pulse-glow" style="animation-delay: 1s;"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8" data-aos="fade-up">
            <div class="glass-card p-8">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-[#305CDE]/20 to-[#00B6DA]/20 border border-[#305CDE]/20 mb-6">
                    <svg class="h-6 w-6 text-[#305CDE]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-primary mb-3" style="font-family: 'Space Grotesk', sans-serif;">Our Mission</h3>
                <p class="text-muted">{{ $aboutContent['mission'] }}</p>
            </div>
            <div class="glass-card p-8">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-[#305CDE]/20 to-[#00B6DA]/20 border border-[#305CDE]/20 mb-6">
                    <svg class="h-6 w-6 text-[#00B6DA]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-primary mb-3" style="font-family: 'Space Grotesk', sans-serif;">Our Vision</h3>
                <p class="text-muted">{{ $aboutContent['vision'] }}</p>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-16 lg:py-24 bg-body relative">
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto text-center" data-aos="fade-up">
            <h3 class="text-2xl lg:text-3xl font-bold text-primary mb-6" style="font-family: 'Space Grotesk', sans-serif;">Why Work With Us?</h3>
            <p class="text-muted leading-relaxed">{{ $aboutContent['why_affordable'] }}</p>
        </div>
    </div>
</section>

<div class="section-divider"></div>

{{-- Meet Our Team --}}
@php
$teamMembers = [
    ['name' => 'Selva',      'role' => 'Full Stack Developer',   'exp' => '6+ Years Experience', 'image' => 'images/developers/selva.jpg'],
    ['name' => 'Nanthini',   'role' => 'Full Stack Developer',   'exp' => '5+ Years Experience', 'image' => 'images/developers/nanthini.jpg'],
    ['name' => 'Balaji',     'role' => 'Full Stack Developer',   'exp' => '4+ Years Experience', 'image' => 'images/developers/balaji.png'],
    ['name' => 'Kanishka',   'role' => 'Mobile App Developer',   'exp' => '4+ Years Experience', 'image' => 'images/developers/kanishka.jpg'],
    ['name' => 'Sanjay',     'role' => 'SEO Specialist',         'exp' => '1+ Years Experience', 'image' => 'images/developers/sanjay.png'],
    ['name' => 'Prasanth',   'role' => 'Full Stack Developer',   'exp' => '3+ Years Experience', 'image' => 'images/developers/prasanth.jpg'],
    ['name' => 'Arthy',      'role' => 'Backend Developer',      'exp' => '3+ Years Experience', 'image' => 'images/developers/arthy.jpg'],
    ['name' => 'Ramkumar',   'role' => 'App Developer',          'exp' => '2+ Years Experience', 'image' => 'images/developers/ram.png'],
];
@endphp

<section id="team" class="py-16 lg:py-24 bg-body relative" aria-labelledby="team-heading">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] top-20 -right-40 animate-pulse-glow" style="animation-delay: 1s;"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 lg:mb-16" data-aos="fade-up">
            <span class="tag mb-4">Our Team</span>
            <h2 id="team-heading" class="text-3xl lg:text-4xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
                Meet the Experts
            </h2>
            <p class="mt-4 text-muted max-w-2xl mx-auto">
                Talented developers and engineers dedicated to delivering exceptional digital products.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @foreach($teamMembers as $index => $member)
                <article
                    class="group relative flex flex-col overflow-hidden rounded-2xl glass-card-hover border border-white/10 shadow-sm hover:shadow-2xl transition-all duration-300"
                    data-aos="fade-up"
                    data-aos-delay="{{ ($index % 3) * 100 }}"
                >
                    <figure class="relative aspect-[4/5] overflow-hidden bg-body m-0">
                        <img
                            src="{{ asset($member['image']) }}"
                            alt="{{ $member['name'] }} - {{ $member['role'] }} at WeSolve Technologies"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                            loading="lazy"
                            decoding="async"
                            width="1080"
                            height="1350"
                        >
                    </figure>

                    <div class="flex flex-1 flex-col justify-between p-5 lg:p-6">
                        <header>
                            <h3 class="text-lg font-semibold text-primary" style="font-family: 'Space Grotesk', sans-serif;">
                                {{ $member['name'] }}
                            </h3>
                            <p class="text-sm font-medium text-[#305CDE]">{{ $member['role'] }}</p>
                        </header>
                        <p class="mt-3 text-xs text-muted">{{ $member['exp'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-12 lg:mt-16 text-center" data-aos="fade-up">
            <a href="{{ route('developers') }}" class="btn-gradient inline-flex items-center justify-center">
                Meet Our Developers
            </a>
        </div>
    </div>

</section>
@endsection
