@extends('layouts.app')

@section('title', 'Digital Marketing Services in Chennai | WeSolve Technologies')
@section('meta_description', 'Grow online with expert Digital Marketing Services in Chennai, including SEO Services in Chennai and Google Ads for better leads.')
@section('meta_keywords', 'Digital Marketing Services in Chennai, SEO Services in Chennai, Google Ads Services in Chennai')

@section('content')
<x-breadcrumbs :items="['Home' => route('home'), 'Services' => route('services'), 'Digital Marketing' => route('service.digital-marketing')]" />
<section class="relative overflow-hidden bg-body pt-16 pb-20 lg:pt-24 lg:pb-28">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] -top-40 -right-40 animate-pulse-glow"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <span class="tag mb-4">Digital Marketing</span>
        <h1 class="text-4xl lg:text-6xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
            Digital Marketing Services <span class="gradient-text">in Chennai</span>
        </h1>
        <p class="mt-6 text-lg text-muted max-w-3xl mx-auto">
            A great product deserves an audience. We help small businesses show up in search results, engage the right people, and turn interest into action.
        </p>
        <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('contact') }}" class="btn-gradient">Grow Your Reach</a>
            <a href="{{ route('services') }}" class="btn-outline">All Services</a>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-16 lg:py-24 bg-body relative">
    <div class="bg-orb bg-orb-blue w-[400px] h-[400px] bottom-0 -left-20 animate-pulse-glow" style="animation-delay: 2s;"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <span class="tag mb-4">How We Help</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
                Practical Marketing for Real Results
            </h2>
            <p class="mt-4 text-muted">
                We do not chase vanity metrics. Our focus is on strategies that bring qualified visitors, build trust, and help you convert them into customers.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="0">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Search Engine Optimization</h3>
                <p class="text-sm text-muted">Improve your visibility on Google with technical SEO, keyword strategy, and content that answers what people are searching for.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="100">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Content Marketing</h3>
                <p class="text-sm text-muted">Blog posts, landing pages, and website copy that explain your value and build confidence with potential customers.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="200">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Paid Advertising</h3>
                <p class="text-sm text-muted">Targeted Google and social media ad campaigns managed to stretch your budget and reach people ready to buy.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="300">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Social Media Marketing</h3>
                <p class="text-sm text-muted">Consistent, purposeful content that keeps your brand active and connects you with your community.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="400">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Performance Tracking</h3>
                <p class="text-sm text-muted">Simple reports that show what is working, what is not, and where to focus your marketing efforts next.</p>
            </div>

            <div class="glass-card-hover p-6 rounded-2xl border border-white/10" data-aos="fade-up" data-aos-delay="500">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] mb-4">
                    <svg class="h-5 w-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-2">Local Marketing</h3>
                <p class="text-sm text-muted">Get noticed by customers nearby with local SEO, Google Business Profile optimization, and location-focused content.</p>
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
                <span class="tag mb-4">Real Results</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4 mb-6" style="font-family: 'Space Grotesk', sans-serif;">Marketing That Brings Enquiries</h2>
                <p class="text-muted mb-4 leading-relaxed">Plenty of agencies chase numbers that look good in a slide but never pay a bill. We care about the one that does, which is real enquiries from people ready to buy, and every campaign we run ties back to that goal.</p>
                <p class="text-muted mb-6 leading-relaxed">We meet your customers where they already spend time, whether that is a Google search, a local map listing, or a social feed, and we send them to pages built to turn interest into action. The aim is a steady, predictable stream of leads you can plan around.</p>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3"><svg class="h-5 w-5 flex-shrink-0 text-[#00B6DA] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-muted">Search optimisation aimed at buyer intent keywords</span></li>
                    <li class="flex items-start gap-3"><svg class="h-5 w-5 flex-shrink-0 text-[#00B6DA] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-muted">Local visibility so nearby customers find you first</span></li>
                    <li class="flex items-start gap-3"><svg class="h-5 w-5 flex-shrink-0 text-[#00B6DA] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-muted">Paid ads managed to a cost per lead you can afford</span></li>
                    <li class="flex items-start gap-3"><svg class="h-5 w-5 flex-shrink-0 text-[#00B6DA] mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg><span class="text-muted">Plain reporting that shows exactly what is working</span></li>
                </ul>
            </div>
            <div data-aos="fade-left">
                <img src="{{ asset('images/placeholder.svg') }}" alt="Digital marketing dashboard showing leads and campaign performance" class="w-full rounded-2xl shadow-lg border border-white/10" loading="lazy" width="1200" height="800" decoding="async">
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-16 lg:py-24 bg-body relative overflow-hidden">
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div data-aos="fade-right" class="order-2 lg:order-1">
                <img src="{{ asset('images/placeholder.svg') }}" alt="Steady growth in website enquiries from a digital marketing campaign" class="w-full rounded-2xl shadow-lg border border-white/10" loading="lazy" width="1200" height="800" decoding="async">
            </div>
            <div data-aos="fade-left" class="order-1 lg:order-2">
                <span class="tag mb-4">Compounding Growth</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4 mb-6" style="font-family: 'Space Grotesk', sans-serif;">Momentum You Can Measure</h2>
                <p class="text-muted mb-4 leading-relaxed">Good marketing builds on itself. Instead of one-off bursts that fade, we work month after month to lift your ranking, sharpen your ads, and refine your message, so the results keep climbing rather than resetting.</p>
                <p class="text-muted leading-relaxed">You will always know where your budget goes and what it brings back. We share clear reports you can act on, and when the data points to a better opportunity we move quickly to take it.</p>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-24 lg:py-32 bg-body relative">
    <div class="bg-orb bg-orb-pink w-[400px] h-[400px] top-20 -right-40 animate-pulse-glow" style="animation-delay: 1s;"></div>
    <div class="relative mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center" data-aos="zoom-in">
        <span class="tag mb-4">Start Growing</span>
        <h2 class="text-3xl lg:text-5xl font-bold text-primary mt-4 mb-6" style="font-family: 'Space Grotesk', sans-serif;">
            Ready to Reach More Customers?
        </h2>
        <p class="text-muted mb-10 max-w-2xl mx-auto">
            Let us review your current presence and put together a marketing plan that fits your business, your audience, and your goals.
        </p>
        <a href="{{ route('contact') }}" class="btn-gradient text-lg py-4 px-10">Get a Marketing Plan</a>
    </div>
</section>
@endsection
