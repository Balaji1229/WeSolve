@extends('layouts.app')

@section('title', 'Freelance Website Development in Chennai | WeSolve Technologies')
@section('meta_description', 'Looking for freelance website development in Chennai? WeSolve Technologies offers freelance web development, freelance web design Chennai, freelance SEO services Chennai, and freelance digital marketing Chennai for growing businesses.')
@section('meta_keywords', 'freelance website development in chennai, freelance web development, freelance web development Chennai, web and digital marketing service, freelance website developer Chennai, freelance digital marketing Chennai, freelance web developer, freelance SEO services Chennai, freelance web design Chennai')

@section('schema_extra')
    {!! \App\Helpers\SeoHelper::schemaService('Freelance Website Development in Chennai', 'Freelance website development, web design, SEO and digital marketing services for businesses in Chennai.', route('service.freelance-web-development'), 'Web Development') !!}
@endsection

@section('content')
<x-breadcrumbs :items="['Home' => route('home'), 'Services' => route('services'), 'Freelance Website Development in Chennai' => route('service.freelance-web-development')]" />
<section class="relative overflow-hidden bg-body pt-16 pb-20 lg:pt-24 lg:pb-28">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] -top-40 -right-40 animate-pulse-glow"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <span class="tag mb-4">Freelance Website Development in Chennai</span>
        <h1 class="text-4xl lg:text-6xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
            Freelance Website Development <span class="gradient-text">in Chennai</span>
        </h1>
        <p class="mt-6 text-lg text-muted max-w-3xl mx-auto">
            Get the flexibility of a freelance web developer with the reliability of an experienced Chennai-based team. We specialize in freelance website development in Chennai, combining fast, SEO-friendly websites with practical digital marketing to help your business attract leads and grow online.
        </p>
        <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="btn-gradient">Discuss Your Project</a>
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
                Freelance Website Development in Chennai With Full-Service Support
            </h2>
            <p class="mt-4 text-muted">
                Whether you need a new website, a redesign, or ongoing web and digital marketing service, our freelance website developer Chennai team delivers personal attention, clear communication, and results-focused work.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="0">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Custom Website Development</h3>
                <p class="text-sm text-muted">Responsive, fast-loading websites built around your goals using Laravel, WordPress, React, or plain HTML/CSS by a trusted freelance web developer.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="100">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Freelance SEO Services Chennai</h3>
                <p class="text-sm text-muted">On-page SEO, technical fixes, and keyword-focused content to help your freelance website development in Chennai rank for the searches that matter.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="200">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Freelance Digital Marketing Chennai</h3>
                <p class="text-sm text-muted">Google Ads, social media ads, and content strategy managed with clear reporting and budget control by our freelance digital marketing Chennai experts.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="300">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Transparent Reporting</h3>
                <p class="text-sm text-muted">Regular updates on progress, traffic, and leads so you always know what your freelance web development Chennai investment is delivering.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="400">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Flexible Engagement</h3>
                <p class="text-sm text-muted">Hire a freelance website developer Chennai for a single project, ongoing support, or a monthly retainer — whatever fits your stage and budget.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="500">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Direct Collaboration</h3>
                <p class="text-sm text-muted">Work directly with the person building and marketing your site — no account managers, no communication gaps in your freelance web development project.</p>
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
                <span class="tag mb-4">Why Freelance Website Development in Chennai</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4 mb-6" style="font-family: 'Space Grotesk', sans-serif;">A Freelance Approach With Agency-Grade Delivery</h2>
                <p class="text-muted mb-4 leading-relaxed">Many businesses in Chennai need a website or marketing support but do not want the overhead of a large agency. Our freelance website development in Chennai model gives you direct access to experienced developers and marketers who treat your project like their own.</p>
                <p class="text-muted mb-6 leading-relaxed">We keep teams small, communication direct, and costs practical. You get the same quality of code, design, and strategy you would expect from a bigger company, but with the personal attention and speed that only a focused freelance web development Chennai partner can provide.</p>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3"><svg class="h-5 w-5 flex-shrink-0 text-[#00B6DA] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-muted">Faster turnaround without layers of approval</span></li>
                    <li class="flex items-start gap-3"><svg class="h-5 w-5 flex-shrink-0 text-[#00B6DA] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-muted">Clear pricing and no hidden agency fees</span></li>
                    <li class="flex items-start gap-3"><svg class="h-5 w-5 flex-shrink-0 text-[#00B6DA] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-muted">One point of contact from start to finish</span></li>
                    <li class="flex items-start gap-3"><svg class="h-5 w-5 flex-shrink-0 text-[#00B6DA] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-muted">Web and digital marketing service under one roof</span></li>
                </ul>
            </div>
            <div data-aos="fade-left">
                <img src="{{ asset('images/services/freelance-web-development-wesolve.webp') }}" alt="Freelance website development in Chennai workspace with laptop and code editor" class="w-full rounded-2xl shadow-lg border border-white/10" loading="lazy" width="1200" height="800" decoding="async">
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-16 lg:py-24 bg-body relative overflow-hidden">
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div data-aos="fade-right" class="order-2 lg:order-1">
                <img src="{{ asset('images/services/freelance-app-development-wesolve.webp') }}" alt="Freelance digital marketing Chennai analytics dashboard showing growth" class="w-full rounded-2xl shadow-lg border border-white/10" loading="lazy" width="1200" height="800" decoding="async">
            </div>
            <div data-aos="fade-left" class="order-1 lg:order-2">
                <span class="tag mb-4">Web & Digital Marketing Service</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4 mb-6" style="font-family: 'Space Grotesk', sans-serif;">Build Once, Market Everywhere</h2>
                <p class="text-muted mb-4 leading-relaxed">A great website is only the beginning. We pair freelance website development in Chennai with practical freelance digital marketing Chennai so your site does not just exist — it works. From search engine optimization to paid ads, we help you reach the right people at the right time.</p>
                <p class="text-muted leading-relaxed">Our web and digital marketing service is designed for small businesses, startups, and solo entrepreneurs in Chennai who want a reliable freelance website developer Chennai partner without long-term contracts or inflated costs.</p>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-16 lg:py-24 bg-body relative">
    <div class="bg-orb bg-orb-pink w-[500px] h-[500px] top-20 -right-40 animate-pulse-glow" style="animation-delay: 1s;"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="tag mb-4">How We Work</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">Simple Process for Freelance Website Development in Chennai</h2>
            <p class="mt-4 text-muted max-w-2xl mx-auto">We keep the process straightforward so you can focus on your business while we handle the freelance web development and marketing work.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="glass-card-hover p-6 text-center" data-aos="fade-up" data-aos-delay="0">
                <div class="h-12 w-12 rounded-full bg-gradient-to-br from-[#305CDE] to-[#00B6DA] flex items-center justify-center text-white font-bold mx-auto mb-4">01</div>
                <h3 class="text-lg font-semibold text-primary mb-2">Discovery</h3>
                <p class="text-sm text-muted">We understand your business, audience, and goals before recommending any freelance website development in Chennai solution.</p>
            </div>
            <div class="glass-card-hover p-6 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="h-12 w-12 rounded-full bg-gradient-to-br from-[#305CDE] to-[#00B6DA] flex items-center justify-center text-white font-bold mx-auto mb-4">02</div>
                <h3 class="text-lg font-semibold text-primary mb-2">Build</h3>
                <p class="text-sm text-muted">We design and develop your website with clean code, SEO structure, and mobile responsiveness as your dedicated freelance web developer.</p>
            </div>
            <div class="glass-card-hover p-6 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="h-12 w-12 rounded-full bg-gradient-to-br from-[#305CDE] to-[#00B6DA] flex items-center justify-center text-white font-bold mx-auto mb-4">03</div>
                <h3 class="text-lg font-semibold text-primary mb-2">Market</h3>
                <p class="text-sm text-muted">We launch freelance SEO services Chennai and freelance digital marketing Chennai campaigns that drive targeted traffic to your site.</p>
            </div>
            <div class="glass-card-hover p-6 text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="h-12 w-12 rounded-full bg-gradient-to-br from-[#305CDE] to-[#00B6DA] flex items-center justify-center text-white font-bold mx-auto mb-4">04</div>
                <h3 class="text-lg font-semibold text-primary mb-2">Optimize</h3>
                <p class="text-sm text-muted">We track performance, refine campaigns, and keep your freelance web development Chennai website secure and up to date.</p>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-16 lg:py-24 bg-body relative">
    <div class="bg-orb bg-orb-blue w-[400px] h-[400px] bottom-0 -left-20 animate-pulse-glow" style="animation-delay: 2s;"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <span class="tag mb-4">Complete Digital Solutions</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">More Than Freelance Website Development in Chennai</h2>
            <p class="mt-4 text-muted">
                While freelance website development in Chennai is our core strength, we also offer a full range of digital services to help your business grow end to end.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <a href="{{ route('service.digital-marketing') }}" class="glass-card-hover p-6 rounded-2xl border border-white/10 block" data-aos="fade-up" data-aos-delay="0">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Digital Marketing</h3>
                <p class="text-sm text-muted">SEO, Google Ads, and social media campaigns that bring qualified leads to your freelance website development in Chennai project.</p>
            </a>

            <a href="{{ route('service.website-development') }}" class="glass-card-hover p-6 rounded-2xl border border-white/10 block" data-aos="fade-up" data-aos-delay="100">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Website Development</h3>
                <p class="text-sm text-muted">Custom, responsive websites built for performance and conversions alongside our freelance web design Chennai services.</p>
            </a>

            <a href="{{ route('service.web-application-development') }}" class="glass-card-hover p-6 rounded-2xl border border-white/10 block" data-aos="fade-up" data-aos-delay="200">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Web Application Development</h3>
                <p class="text-sm text-muted">Scalable web apps, dashboards, and business tools when your freelance website developer Chennai needs go beyond a standard site.</p>
            </a>

            <a href="{{ route('service.mobile-app-development') }}" class="glass-card-hover p-6 rounded-2xl border border-white/10 block" data-aos="fade-up" data-aos-delay="300">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Mobile App Development</h3>
                <p class="text-sm text-muted">Android and Flutter apps that extend your freelance website development in Chennai presence to mobile users.</p>
            </a>

            <a href="{{ route('service.ui-ux-design') }}" class="glass-card-hover p-6 rounded-2xl border border-white/10 block" data-aos="fade-up" data-aos-delay="400">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">UI/UX Design</h3>
                <p class="text-sm text-muted">Intuitive interfaces and user experiences that make your freelance web design Chennai output easy and enjoyable to use.</p>
            </a>

            <a href="{{ route('service.ai-automation-solutions') }}" class="glass-card-hover p-6 rounded-2xl border border-white/10 block" data-aos="fade-up" data-aos-delay="500">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">AI & Automation Solutions</h3>
                <p class="text-sm text-muted">Smart chatbots and automation workflows that save time for your freelance web development Chennai business.</p>
            </a>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-24 lg:py-32 bg-body relative">
    <div class="bg-orb bg-orb-pink w-[400px] h-[500px] top-20 -right-40 animate-pulse-glow" style="animation-delay: 1s;"></div>
    <div class="relative mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center" data-aos="zoom-in">
        <span class="tag mb-4">Start Your Project</span>
        <h2 class="text-3xl lg:text-5xl font-bold text-primary mt-4 mb-6" style="font-family: 'Space Grotesk', sans-serif;">
            Let's Build & Grow Together
        </h2>
        <p class="text-muted mb-10 max-w-2xl mx-auto">
            Ready for freelance website development in Chennai and digital marketing that actually delivers? Tell us about your project and our freelance website developer Chennai team will respond with a clear plan and quote.
        </p>
        <a href="{{ route('contact') }}" class="btn-gradient text-lg py-4 px-10">Get a Free Quote</a>
    </div>
</section>
@endsection
