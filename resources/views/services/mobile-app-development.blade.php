@extends('layouts.app')

@section('title', 'Mobile App Development Services in Chennai | WeSolve Technologies')
@section('meta_description', 'Build Android and Flutter apps with Mobile App Development Services in Chennai for scalable, secure, and user-friendly solutions.')
@section('meta_keywords', 'Mobile App Development Services in Chennai, Android App Development Company in Chennai, Flutter App Development Company in Chennai')

@section('content')
<x-breadcrumbs :items="['Home' => route('home'), 'Services' => route('services'), 'Mobile App Development' => route('service.mobile-app-development')]" />
<section class="relative overflow-hidden bg-body pt-16 pb-20 lg:pt-24 lg:pb-28">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] -top-40 -right-40 animate-pulse-glow"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <span class="tag mb-4">Mobile App Development</span>
        <h1 class="text-4xl lg:text-6xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
            Mobile App Development <span class="gradient-text">in Chennai</span>
        </h1>
        <p class="mt-6 text-lg text-muted max-w-3xl mx-auto">
            Reach customers on the devices they use every day. We design and build mobile apps that are fast, intuitive, and built for real-world use.
        </p>
        <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="btn-gradient">Build Your App</a>
            <a href="{{ route('services') }}" class="btn-outline">All Services</a>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-16 lg:py-24 bg-body relative">
    <div class="bg-orb bg-orb-blue w-[400px] h-[400px] bottom-0 -left-20 animate-pulse-glow" style="animation-delay: 2s;"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <span class="tag mb-4">What You Get</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
                Mobile Experiences People Actually Use
            </h2>
            <p class="mt-4 text-muted">
                We focus on apps that solve problems simply. From first sketch to app store launch, we keep the user at the center of every decision.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="0">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">iOS & Android</h3>
                <p class="text-sm text-muted">Native performance and platform-specific design patterns for both Apple and Android users.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="100">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Cross-Platform Options</h3>
                <p class="text-sm text-muted">One codebase for both platforms when speed and budget matter, without sacrificing quality.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="200">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Push Notifications</h3>
                <p class="text-sm text-muted">Keep users engaged with timely updates, reminders, and personalized messages.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="300">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Secure Login & Data</h3>
                <p class="text-sm text-muted">Encrypted connections, safe authentication, and responsible data handling for your users.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="400">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">App Store Launch</h3>
                <p class="text-sm text-muted">We guide you through publishing on the App Store and Google Play, including assets and descriptions.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="500">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">API & Backend Ready</h3>
                <p class="text-sm text-muted">We connect your app to the backend, database, or third-party services it needs to function.</p>
            </div>
        </div>
    </div>
</section>

{{-- service-extra-sections --}}
<div class="section-divider"></div>

<section class="py-16 lg:py-24 bg-body relative overflow-hidden">
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div data-aos="fade-right">
                <span class="tag mb-4">Apps People Keep</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4 mb-6" style="font-family: 'Space Grotesk', sans-serif;">An App Worth a Spot on the Home Screen</h2>
                <p class="text-muted mb-4 leading-relaxed">Phone screens are crowded and most apps get deleted within a week. We design apps that earn their place by being genuinely useful, quick to open, and focused on the handful of things your users actually came to do.</p>
                <p class="text-muted mb-6 leading-relaxed">Whether you need iOS, Android, or both, we build with efficient shared code so you reach everyone without paying for two separate apps. Every screen is checked on real devices, so taps feel right and nothing falls apart in the user's hand.</p>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3"><svg class="h-5 w-5 flex-shrink-0 text-[#00B6DA] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-muted">Smooth performance on everyday phones, not just new flagships</span></li>
                    <li class="flex items-start gap-3"><svg class="h-5 w-5 flex-shrink-0 text-[#00B6DA] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-muted">Secure sign in and careful handling of personal data</span></li>
                    <li class="flex items-start gap-3"><svg class="h-5 w-5 flex-shrink-0 text-[#00B6DA] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-muted">Push notifications that gently bring users back</span></li>
                    <li class="flex items-start gap-3"><svg class="h-5 w-5 flex-shrink-0 text-[#00B6DA] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-muted">Help getting approved and live on the app stores</span></li>
                </ul>
            </div>
            <div data-aos="fade-left">
                <img src="{{ asset('images/placeholder.svg') }}" alt="Mobile app running on iOS and Android smartphones" class="w-full rounded-2xl shadow-lg border border-white/10" loading="lazy" width="1200" height="800" decoding="async">
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-16 lg:py-24 bg-body relative overflow-hidden">
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div data-aos="fade-right" class="order-2 lg:order-1">
                <img src="{{ asset('images/placeholder.svg') }}" alt="Mobile app being published to the Apple and Google app stores" class="w-full rounded-2xl shadow-lg border border-white/10" loading="lazy" width="1200" height="800" decoding="async">
            </div>
            <div data-aos="fade-left" class="order-1 lg:order-2">
                <span class="tag mb-4">End to End</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4 mb-6" style="font-family: 'Space Grotesk', sans-serif;">From Idea to the App Store With You</h2>
                <p class="text-muted mb-4 leading-relaxed">Launching an app involves far more than writing code. There are store guidelines, review queues, and updates to manage, and we handle that technical side while keeping you informed in plain language at every stage.</p>
                <p class="text-muted leading-relaxed">Once it is live we stay close, fixing issues, shipping improvements, and adapting as you learn what your users love. Your app becomes a product that keeps getting better with each release rather than a one-off project.</p>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-24 lg:py-32 bg-body relative">
    <div class="bg-orb bg-orb-pink w-[400px] h-[400px] top-20 -right-40 animate-pulse-glow" style="animation-delay: 1s;"></div>
    <div class="relative mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center" data-aos="zoom-in">
        <span class="tag mb-4">Ready to Launch?</span>
        <h2 class="text-3xl lg:text-5xl font-bold text-primary mt-4 mb-6" style="font-family: 'Space Grotesk', sans-serif;">
            Let's Bring Your App Idea to Life
        </h2>
        <p class="text-muted mb-10 max-w-2xl mx-auto">
            From a simple idea to a published app, we will help you plan, design, build, and launch something your users will love.
        </p>
        <a href="{{ route('contact') }}" class="btn-gradient text-lg py-4 px-10">Talk to Our Team</a>
    </div>
</section>
@endsection
