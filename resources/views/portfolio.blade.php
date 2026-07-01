@extends('layouts.app')

@section('title', 'Developer Portfolio - WeSolve Technologies')

@section('content')
<x-breadcrumbs :items="['Home' => route('home'), 'Portfolio' => route('portfolio')]" />
<section class="relative overflow-hidden bg-body pt-16 pb-20 lg:pt-24 lg:pb-28">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] -top-40 -right-40 animate-pulse-glow"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <span class="tag mb-4">Developer Portfolio</span>
        <h1 class="text-3xl sm:text-4xl lg:text-6xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
            Projects I've <span class="gradient-text">Built</span>
        </h1>
        <p class="mt-6 text-lg text-secondary max-w-2xl mx-auto">
            A curated collection of web applications, e-commerce platforms, and digital solutions crafted with modern technologies for real-world impact.
        </p>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-24 lg:py-32 bg-body relative">
    <div class="bg-orb bg-orb-blue w-[400px] h-[400px] bottom-0 -left-20 animate-pulse-glow" style="animation-delay: 2s;"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

            {{-- Project 1: BookAcross --}}
            <div class="project-card" data-aos="fade-up" data-project="bookacross">
                <div class="project-scroll-wrap relative">
                    <img src="{{ asset('images/bookacross.png') }}" alt="BookAcross App" class="project-img active" loading="lazy" width="800" height="600" decoding="async">
                    <img src="{{ asset('images/bookacross-dashboard.png') }}" alt="BookAcross Dashboard" class="project-img hidden" loading="lazy" width="800" height="600" decoding="async">

                    <button type="button" class="project-carousel-btn prev" aria-label="Previous image" data-action="prev">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button type="button" class="project-carousel-btn next" aria-label="Next image" data-action="next">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    <div class="project-dots">
                        <button type="button" class="project-dot active" data-index="0" aria-label="Image 1"></button>
                        <button type="button" class="project-dot" data-index="1" aria-label="Image 2"></button>
                    </div>
                </div>

                <div class="p-8">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="h-2 w-2 rounded-full bg-green-400"></div>
                        <span class="text-xs text-muted">Completed</span>
                        <span class="tag text-xs ml-auto">Travel App</span>
                    </div>
                    <h2 class="text-2xl font-semibold text-primary mb-3" style="font-family: 'Space Grotesk', sans-serif;">BookAcross</h2>
                    <p class="text-sm text-secondary leading-relaxed mb-6">
                        A complete travel application designed to book tour packages and hotels across the country. The platform features real-time availability checks, secure payment processing, detailed itinerary planning, user reviews and ratings, and a comprehensive admin dashboard for managing bookings, packages, and customer inquiries. Built with scalability in mind to handle thousands of concurrent users during peak travel seasons.
                    </p>

                    <div class="mb-6">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="h-4 w-4 text-muted-light" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                            <span class="text-xs text-muted-light uppercase tracking-wider">Tech Stack</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="project-tech-tag">Laravel</span>
                            <span class="project-tech-tag">Vue.js</span>
                            <span class="project-tech-tag">MySQL</span>
                            <span class="project-tech-tag">Tailwind CSS</span>
                            <span class="project-tech-tag">Redis</span>
                        </div>
                    </div>

                    {{-- <div class="flex items-center gap-3 mb-6">
                        <div class="h-8 w-8 rounded-full bg-gradient-to-br from-[#305CDE] to-[#00B6DA] flex items-center justify-center text-white text-xs font-bold">RA</div>
                        <div>
                            <div class="text-primary text-sm font-medium">Ravi Anand</div>
                            <div class="text-muted-light text-xs">CEO, BookAcross Travels</div>
                        </div>
                    </div> --}}
                </div>
            </div>

            {{-- Project 2: Crackers Shop --}}
            <div class="project-card" data-aos="fade-up" data-aos-delay="100" data-project="crackers">
                <div class="project-scroll-wrap relative">
                    <img src="{{ asset('images/crackers-app.png') }}" alt="Crackers App" class="project-img active" loading="lazy" width="800" height="600" decoding="async">
                    <img src="{{ asset('images/crackers-shop.png') }}" alt="Crackers Shop" class="project-img hidden" loading="lazy" width="800" height="600" decoding="async">

                    <button type="button" class="project-carousel-btn prev" aria-label="Previous image" data-action="prev">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button type="button" class="project-carousel-btn next" aria-label="Next image" data-action="next">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    <div class="project-dots">
                        <button type="button" class="project-dot active" data-index="0" aria-label="Image 1"></button>
                        <button type="button" class="project-dot" data-index="1" aria-label="Image 2"></button>
                    </div>
                </div>

                <div class="p-8">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="h-2 w-2 rounded-full bg-green-400"></div>
                        <span class="text-xs text-muted">Completed</span>
                        <span class="tag text-xs ml-auto">E-Commerce</span>
                    </div>
                    <h2 class="text-2xl font-semibold text-primary mb-3" style="font-family: 'Space Grotesk', sans-serif;">Crackers Shop</h2>
                    <p class="text-sm text-secondary leading-relaxed mb-6">
                        An India-based online crackers selling application built on a monthly subscription model. The platform includes a rich product catalog with category filters, a streamlined order management system, real-time delivery tracking, integrated secure payment gateway, inventory management, and a dedicated admin panel for vendors. Designed to handle festive season traffic spikes with optimized performance and caching strategies.
                    </p>

                    <div class="mb-6">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="h-4 w-4 text-muted-light" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                            <span class="text-xs text-muted-light uppercase tracking-wider">Tech Stack</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="project-tech-tag">React</span>
                            <span class="project-tech-tag">Node.js</span>
                            <span class="project-tech-tag">MongoDB</span>
                            <span class="project-tech-tag">Express</span>
                            <span class="project-tech-tag">Stripe</span>
                        </div>
                    </div>

                    {{-- <div class="flex items-center gap-3 mb-6">
                        <div class="h-8 w-8 rounded-full bg-gradient-to-br from-[#305CDE] to-[#00B6DA] flex items-center justify-center text-white text-xs font-bold">SK</div>
                        <div>
                            <div class="text-primary text-sm font-medium">Suresh Kumar</div>
                            <div class="text-muted-light text-xs">Founder, Crackers Shop India</div>
                        </div>
                    </div> --}}
                </div>
            </div>

            {{-- Project 3: Kesha Sri Collections --}}
            <div class="project-card" data-aos="fade-up" data-project="keshasri">
                <div class="project-scroll-wrap relative">
                    <img src="{{ asset('images/keshasricollections.png') }}" alt="Kesha Sri Collections" class="project-img active" loading="lazy" width="800" height="600" decoding="async">
                    <img src="{{ asset('images/keshasricollection-app.png') }}" alt="Kesha Sri Collections App" class="project-img hidden" loading="lazy" width="800" height="600" decoding="async">

                    <button type="button" class="project-carousel-btn prev" aria-label="Previous image" data-action="prev">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button type="button" class="project-carousel-btn next" aria-label="Next image" data-action="next">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    <div class="project-dots">
                        <button type="button" class="project-dot active" data-index="0" aria-label="Image 1"></button>
                        <button type="button" class="project-dot" data-index="1" aria-label="Image 2"></button>
                    </div>
                </div>

                <div class="p-8">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="h-2 w-2 rounded-full bg-green-400"></div>
                        <span class="text-xs text-muted">Completed</span>
                        <span class="tag text-xs ml-auto">EdTech</span>
                    </div>
                    <h2 class="text-2xl font-semibold text-primary mb-3" style="font-family: 'Space Grotesk', sans-serif;">Kesha Sri Collections</h2>
                    <p class="text-sm text-secondary leading-relaxed mb-6">
                        An online tutorial application offering interactive courses, video lessons, progress tracking, and personalized learning paths for students. The platform features a student dashboard with course enrollment, quiz assessments, achievement badges, live class integration, and a powerful content management system for educators. Built to deliver a seamless learning experience across all devices with offline video support.
                    </p>

                    <div class="mb-6">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="h-4 w-4 text-muted-light" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                            </svg>
                            <span class="text-xs text-muted-light uppercase tracking-wider">Tech Stack</span>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <span class="project-tech-tag">Laravel</span>
                            <span class="project-tech-tag">Tailwind CSS</span>
                            <span class="project-tech-tag">Alpine.js</span>
                            <span class="project-tech-tag">MySQL</span>
                            <span class="project-tech-tag">WebSocket</span>
                        </div>
                    </div>

                    {{-- <div class="flex items-center gap-3 mb-6">
                        <div class="h-8 w-8 rounded-full bg-gradient-to-br from-[#305CDE] to-[#00B6DA] flex items-center justify-center text-white text-xs font-bold">KP</div>
                        <div>
                            <div class="text-primary text-sm font-medium">Kesha Priya</div>
                            <div class="text-muted-light text-xs">Director, Kesha Sri Collections</div>
                        </div>
                    </div> --}}
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
