@extends('layouts.app')

@section('title', 'Our Services - WeSolve Technologies')
@section('meta_description', 'Explore our professional digital services: website development, web applications, mobile apps, digital marketing, AI automation, UI/UX design, cloud solutions, and maintenance support.')
@section('meta_keywords', 'website development, web application development, mobile app development, digital marketing, AI automation, UI UX design, cloud solutions, maintenance support')

@section('content')
<x-breadcrumbs :items="['Home' => route('home'), 'Services' => route('services')]" />
<section class="relative overflow-hidden bg-body pt-16 pb-20 lg:pt-24 lg:pb-28" aria-labelledby="services-hero-heading">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] -top-40 -right-40 animate-pulse-glow"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <span class="tag mb-4">What We Do</span>
        <h1 id="services-hero-heading" class="text-4xl lg:text-6xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
            Services Built for <span class="gradient-text">Your Growth</span>
        </h1>
        <p class="mt-6 text-lg text-muted max-w-3xl mx-auto">
            From websites and apps to AI-powered automation and cloud infrastructure, we deliver practical digital solutions that help small businesses move faster and serve customers better.
        </p>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-16 lg:py-24 bg-body relative" aria-label="Our services">
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $serviceList = [
                    ['title' => 'Website Development', 'route' => 'service.website-development', 'desc' => 'Custom, responsive websites designed to represent your brand and turn visitors into customers.', 'delay' => 0],
                    ['title' => 'Web Application Development', 'route' => 'service.web-application-development', 'desc' => 'Scalable web apps with powerful backends, dashboards, and workflows tailored to your operations.', 'delay' => 100],
                    ['title' => 'Mobile App Development', 'route' => 'service.mobile-app-development', 'desc' => 'Native and cross-platform mobile apps that keep your business in your customers\' pockets.', 'delay' => 200],
                    ['title' => 'Digital Marketing', 'route' => 'service.digital-marketing', 'desc' => 'SEO, content, and paid strategies that increase visibility and bring qualified traffic to your business.', 'delay' => 300],
                    ['title' => 'AI & Automation Solutions', 'route' => 'service.ai-automation-solutions', 'desc' => 'Smart chatbots, automation workflows, and AI tools that save time and improve customer experiences.', 'delay' => 400],
                    ['title' => 'UI/UX Design', 'route' => 'service.ui-ux-design', 'desc' => 'Intuitive interfaces and user experiences that make your product easy and enjoyable to use.', 'delay' => 500],
                    ['title' => 'Cloud Solutions', 'route' => 'service.cloud-solutions', 'desc' => 'Reliable cloud hosting, deployment, and infrastructure that grow with your business.', 'delay' => 600],
                    ['title' => 'Maintenance & Support', 'route' => 'service.maintenance-support', 'desc' => 'Ongoing updates, security, and support to keep your website or app running smoothly.', 'delay' => 700],
                ];
            @endphp

            @foreach($serviceList as $index => $service)
            <article class="glass-card-hover p-8 rounded-2xl border border-white/10 transition hover:-translate-y-1 hover:shadow-xl" data-aos="fade-up" data-aos-delay="{{ $service['delay'] }}">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-[#305CDE]/20 to-[#00B6DA]/20 border border-[#305CDE]/20 mb-6">
                    <span class="text-lg font-bold gradient-text">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-3" style="font-family: 'Space Grotesk', sans-serif;">{{ $service['title'] }}</h3>
                <p class="text-sm text-muted leading-relaxed mb-4">{{ $service['desc'] }}</p>
                <a href="{{ route($service['route']) }}" class="text-sm text-muted hover:text-[#305CDE] transition inline-flex items-center gap-1">
                    Learn More <span>→</span>
                </a>
            </article>
            @endforeach
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-24 lg:py-32 bg-body relative">
    <div class="bg-orb bg-orb-pink w-[400px] h-[400px] top-20 -right-40 animate-pulse-glow" style="animation-delay: 1s;"></div>
    <div class="relative mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center" data-aos="zoom-in">
        <span class="tag mb-4">Get Started</span>
        <h2 class="text-3xl lg:text-5xl font-bold text-primary mt-4 mb-6" style="font-family: 'Space Grotesk', sans-serif;">
            Not Sure What You Need?
        </h2>
        <p class="text-muted mb-10 max-w-2xl mx-auto">
            Tell us about your business and goals. We will recommend the right mix of services and build a plan that fits your budget.
        </p>
        <a href="{{ route('contact') }}" class="btn-gradient text-lg py-4 px-10">Discuss Your Project</a>
    </div>
</section>
@endsection
