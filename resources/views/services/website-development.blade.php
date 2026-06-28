@extends('layouts.app')

@section('title', 'Website Development in Chennai | WeSolve Technologies')
@section('meta_description', 'Looking for website development in Chennai? We build custom, responsive, SEO-friendly business websites that load fast and turn visitors into customers.')
@section('meta_keywords', 'Website Development in Chennai, Custom Website Development in Chennai, Responsive Website Development Services in Chennai, Business Website Development in Chennai')

@section('content')
<x-breadcrumbs :items="['Home' => route('home'), 'Services' => route('services'), 'Website Development' => route('service.website-development')]" />
<section class="relative overflow-hidden bg-body pt-16 pb-20 lg:pt-24 lg:pb-28">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] -top-40 -right-40 animate-pulse-glow"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <span class="tag mb-4">Website Development</span>
        <h1 class="text-4xl lg:text-6xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
            Website Development <span class="gradient-text">in Chennai</span>
        </h1>
        <p class="mt-6 text-lg text-muted max-w-3xl mx-auto">
            Your website is often the first place customers meet your business. We build clean, fast, and mobile-friendly websites that make a strong first impression and guide visitors toward action.
        </p>
        <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="btn-gradient">Discuss Your Website</a>
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
                A Website Built Around Your Business
            </h2>
            <p class="mt-4 text-muted">
                Every site we build is tailored to your goals, audience, and brand. No cookie-cutter templates, no unnecessary complexity.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="0">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Mobile-First Design</h3>
                <p class="text-sm text-muted">Your site will look and perform beautifully on phones, tablets, and desktops from day one.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="100">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Fast Loading Speed</h3>
                <p class="text-sm text-muted">Optimized code, compressed images, and clean architecture keep load times low and visitors happy.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="200">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">SEO-Ready Structure</h3>
                <p class="text-sm text-muted">Proper headings, meta tags, and page structure help search engines understand and rank your content.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="300">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Easy to Update</h3>
                <p class="text-sm text-muted">We build on platforms and code you can manage yourself, or we can handle updates for you.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="400">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Secure & Reliable</h3>
                <p class="text-sm text-muted">SSL, clean code, and best practices keep your site safe, stable, and trustworthy.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="500">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Built for Your Audience</h3>
                <p class="text-sm text-muted">We design with your customers in mind, making it easy for them to find what they need and take the next step.</p>
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
                <span class="tag mb-4">Why It Matters</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4 mb-6" style="font-family: 'Space Grotesk', sans-serif;">A Website That Earns Its Keep</h2>
                <p class="text-muted mb-4 leading-relaxed">Your website is often the first place a customer meets your business, and they decide within seconds whether to stay. We plan every page around the questions people actually ask, so visitors find what they need quickly and feel confident enough to get in touch.</p>
                <p class="text-muted mb-6 leading-relaxed">Most small business sites quietly lose people because they load slowly or feel awkward on a phone. We solve that at the foundation, building lightweight pages that open fast and stay easy to read on any screen, from an old Android to a desktop monitor.</p>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3"><svg class="h-5 w-5 flex-shrink-0 text-[#00B6DA] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-muted">Clear navigation that points visitors toward an enquiry</span></li>
                    <li class="flex items-start gap-3"><svg class="h-5 w-5 flex-shrink-0 text-[#00B6DA] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-muted">Layout and wording shaped around your specific services</span></li>
                    <li class="flex items-start gap-3"><svg class="h-5 w-5 flex-shrink-0 text-[#00B6DA] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-muted">Contact forms, WhatsApp, and call buttons wired in from day one</span></li>
                    <li class="flex items-start gap-3"><svg class="h-5 w-5 flex-shrink-0 text-[#00B6DA] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-muted">Room to add pages and features as your business grows</span></li>
                </ul>
            </div>
            <div data-aos="fade-left">
                <img src="{{ asset('images/placeholder.svg') }}" alt="Responsive small business website shown on a laptop and mobile phone" class="w-full rounded-2xl shadow-lg border border-white/10" loading="lazy" width="1200" height="800" decoding="async">
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-16 lg:py-24 bg-body relative overflow-hidden">
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div data-aos="fade-right" class="order-2 lg:order-1">
                <img src="{{ asset('images/placeholder.svg') }}" alt="Search engine results page listing a well optimised business website" class="w-full rounded-2xl shadow-lg border border-white/10" loading="lazy" width="1200" height="800" decoding="async">
            </div>
            <div data-aos="fade-left" class="order-1 lg:order-2">
                <span class="tag mb-4">Found on Google</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4 mb-6" style="font-family: 'Space Grotesk', sans-serif;">Built to Be Discovered</h2>
                <p class="text-muted mb-4 leading-relaxed">A good-looking site means little if nobody can find it. We structure each page with proper headings, descriptive titles, and clean code that search engines can read without guessing, giving your business a fair chance to rank for the terms your customers search.</p>
                <p class="text-muted leading-relaxed">From the first sketch we keep your real keywords and local searches in mind, so the site keeps pulling in visitors long after launch instead of sitting quietly in a corner of the internet.</p>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-24 lg:py-32 bg-body relative">
    <div class="bg-orb bg-orb-pink w-[400px] h-[400px] top-20 -right-40 animate-pulse-glow" style="animation-delay: 1s;"></div>
    <div class="relative mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center" data-aos="zoom-in">
        <span class="tag mb-4">Ready to Build?</span>
        <h2 class="text-3xl lg:text-5xl font-bold text-primary mt-4 mb-6" style="font-family: 'Space Grotesk', sans-serif;">
            Let's Create Your Website
        </h2>
        <p class="text-muted mb-10 max-w-2xl mx-auto">
            Whether you are starting fresh or redesigning an existing site, we will guide you through every step and deliver a website you are proud to share.
        </p>
        <a href="{{ route('contact') }}" class="btn-gradient text-lg py-4 px-10">Get a Free Quote</a>
    </div>
</section>
@endsection
