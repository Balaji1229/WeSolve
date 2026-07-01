@extends('layouts.app')

@section('title', 'Digital Marketing & Web Development Company in Chennai | WeSolve Technologies')
@section('meta_description', 'Grow your business with a trusted Digital Marketing Company in Chennai offering SEO, web development, web application development, mobile apps, Google Ads, and digital marketing solutions.')
@section('meta_keywords', 'Digital Marketing Company in Chennai, Digital Marketing Agency in Chennai, Best Digital Marketing Company in Chennai, SEO Services in Chennai, Website Development Company in Chennai, Web Development Company in Chennai, Web Application Development Services in Chennai, Mobile App Development Services in Chennai, Software Development Company in Chennai')

@section('content')
{{-- Hero Section --}}
<section class="relative overflow-hidden bg-body pt-16 pb-24 lg:pt-24 lg:pb-24">
    {{-- Background gradient orbs --}}
    <div class="bg-orb bg-orb-purple w-[600px] h-[600px] -top-40 -right-40 animate-pulse-glow"></div>
    <div class="bg-orb bg-orb-blue w-[400px] h-[400px] top-1/2 -left-20 animate-pulse-glow" style="animation-delay: 2s;"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center" data-aos="fade-up">
            {{-- Tag --}}
            <div class="inline-flex mb-6">
                <span class="tag">
                    <svg class="w-3 h-3 mr-2 text-[#305CDE]" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    Trusted Digital Agency
                </span>
            </div>

            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-7xl font-bold tracking-tight leading-tight" style="font-family: 'Space Grotesk', sans-serif;">
                <span class="text-primary">Digital Marketing</span><br class="hidden sm:block">
                <span class="gradient-text">Company in Chennai</span>
            </h1>

            <p class="mt-6 text-lg leading-8 text-secondary max-w-2xl mx-auto">
                WeSolve Technologies is a results-driven digital marketing company in Chennai. We build stunning websites, powerful web apps, and SEO &amp; social media strategies that help your business grow online.
            </p>

            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="btn-gradient">Start Your Project</a>
                <a href="{{ route('portfolio') }}" class="btn-outline">View Our Work</a>
            </div>
        </div>

        {{-- Stats --}}
        <div class="mt-16 py-8 grid grid-cols-2 md:grid-cols-4 gap-6" data-aos="fade-up" data-aos-delay="200">
            <div class="glass-card p-6 text-center">
                <div class="text-3xl lg:text-4xl font-bold gradient-text" style="font-family: 'Space Grotesk', sans-serif;">4+</div>
                <div class="mt-1 text-sm text-muted">Projects Completed</div>
            </div>
            <div class="glass-card p-6 text-center">
                <div class="text-3xl lg:text-4xl font-bold gradient-text" style="font-family: 'Space Grotesk', sans-serif;">5+</div>
                <div class="mt-1 text-sm text-muted">Happy Clients</div>
            </div>
            <div class="glass-card p-6 text-center">
                <div class="text-3xl lg:text-4xl font-bold gradient-text" style="font-family: 'Space Grotesk', sans-serif;">6+</div>
                <div class="mt-1 text-sm text-muted">Years Experience</div>
            </div>
            <div class="glass-card p-6 text-center">
                <div class="text-3xl lg:text-4xl font-bold gradient-text" style="font-family: 'Space Grotesk', sans-serif;">99%</div>
                <div class="mt-1 text-sm text-muted">Satisfaction</div>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

{{-- Services Section --}}
<section class="py-16 lg:py-24 bg-body relative">
    <div class="bg-orb bg-orb-pink w-[500px] h-[500px] top-20 -right-40 animate-pulse-glow" style="animation-delay: 1s;"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="tag mb-4">What We Do</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">Services We Offer</h2>
            <p class="mt-4 text-muted max-w-2xl mx-auto">Comprehensive digital solutions tailored to elevate your brand and accelerate business growth.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $homeServices = [
                    ['title' => 'Website Development', 'route' => 'service.website-development', 'desc' => 'Custom, responsive websites designed to represent your brand and turn visitors into customers.'],
                    ['title' => 'Web Application Development', 'route' => 'service.web-application-development', 'desc' => 'Scalable web apps with powerful backends, dashboards, and workflows tailored to your operations.'],
                    ['title' => 'Mobile App Development', 'route' => 'service.mobile-app-development', 'desc' => 'Native and cross-platform mobile apps that keep your business in your customers\' pockets.'],
                    ['title' => 'Digital Marketing', 'route' => 'service.digital-marketing', 'desc' => 'SEO, content, and paid strategies that increase visibility and bring qualified traffic to your business.'],
                    ['title' => 'AI & Automation Solutions', 'route' => 'service.ai-automation-solutions', 'desc' => 'Smart chatbots, automation workflows, and AI tools that save time and improve customer experiences.'],
                    ['title' => 'UI/UX Design', 'route' => 'service.ui-ux-design', 'desc' => 'Intuitive interfaces and user experiences that make your product easy and enjoyable to use.'],
                    ['title' => 'Cloud Solutions', 'route' => 'service.cloud-solutions', 'desc' => 'Reliable cloud hosting, deployment, and infrastructure that grow with your business.'],
                    ['title' => 'Maintenance & Support', 'route' => 'service.maintenance-support', 'desc' => 'Ongoing updates, security, and support to keep your website or app running smoothly.'],
                ];
            @endphp

            @foreach($homeServices as $index => $service)
            <div class="glass-card-hover p-8" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-[#305CDE]/20 to-[#00B6DA]/20 border border-[#305CDE]/20 mb-6">
                    <span class="text-xl font-bold gradient-text">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                </div>
                <h3 class="text-lg font-semibold text-primary mb-3" style="font-family: 'Space Grotesk', sans-serif;">{{ $service['title'] }}</h3>
                <p class="text-sm text-muted leading-relaxed mb-4">{{ $service['desc'] }}</p>
                <a href="{{ route($service['route']) }}" class="text-sm text-muted hover:text-[#305CDE] transition inline-flex items-center gap-1">
                    Learn More <span>→</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="section-divider"></div>

{{-- Recent Projects --}}
<section class="py-16 lg:py-24 bg-body relative">
    <div class="bg-orb bg-orb-blue w-[400px] h-[400px] bottom-0 left-0 animate-pulse-glow" style="animation-delay: 3s;"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="tag mb-4">Our Works</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">Recent Projects</h2>
            <p class="mt-4 text-muted max-w-2xl mx-auto">Handpicked projects showcasing our expertise in web development, mobile apps, and e-commerce solutions.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Project 1: BookAcross --}}
            <div class="project-card" data-aos="fade-up" data-project="bookacross">
                <div class="project-scroll-wrap relative">
                    <img src="{{ asset('images/bookacross.png') }}" alt="BookAcross App" class="project-img active" loading="lazy" width="800" height="600" decoding="async">
                    <img src="{{ asset('images/bookacross-dashboard.png') }}" alt="BookAcross Dashboard" class="project-img hidden" loading="lazy" width="800" height="600" decoding="async">

                    {{-- Navigation arrows --}}
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

                    {{-- Dots indicator --}}
                    <div class="project-dots">
                        <button type="button" class="project-dot active" data-index="0" aria-label="Image 1"></button>
                        <button type="button" class="project-dot" data-index="1" aria-label="Image 2"></button>
                    </div>
                </div>

                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-lg font-semibold text-primary" style="font-family: 'Space Grotesk', sans-serif;">BookAcross</h3>
                        <span class="tag text-xs">Travel App</span>
                    </div>
                    <p class="text-sm text-muted leading-relaxed mb-4">A complete travel application to book tour packages and hotels across the country. Features real-time availability, secure payments, itinerary planning, and user reviews.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="project-tech-tag">Laravel</span>
                        <span class="project-tech-tag">Vue.js</span>
                        <span class="project-tech-tag">MySQL</span>
                    </div>
                    <a href="{{ route('portfolio') }}" class="project-link">
                        View Project <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            {{-- Project 2: Crackers --}}
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

                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-lg font-semibold text-primary" style="font-family: 'Space Grotesk', sans-serif;">Crackers Shop</h3>
                        <span class="tag text-xs">E-Commerce</span>
                    </div>
                    <p class="text-sm text-muted leading-relaxed mb-4">An India-based online crackers selling application with monthly subscription plans. Features product catalog, order management, delivery tracking, and secure payment gateway.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="project-tech-tag">React</span>
                        <span class="project-tech-tag">Node.js</span>
                        <span class="project-tech-tag">MongoDB</span>
                    </div>
                    <a href="{{ route('portfolio') }}" class="project-link">
                        View Project <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>

            {{-- Project 3: Kesha Sri Collections --}}
            <div class="project-card" data-aos="fade-up" data-aos-delay="200" data-project="keshasri">
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

                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-lg font-semibold text-primary" style="font-family: 'Space Grotesk', sans-serif;">Kesha Sri Collections</h3>
                        <span class="tag text-xs">EdTech</span>
                    </div>
                    <p class="text-sm text-muted leading-relaxed mb-4">An online tutorial application offering interactive courses, video lessons, progress tracking, and personalized learning paths for students.</p>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="project-tech-tag">Laravel</span>
                        <span class="project-tech-tag">Tailwind CSS</span>
                        <span class="project-tech-tag">Alpine.js</span>
                    </div>
                    <a href="{{ route('portfolio') }}" class="project-link">
                        View Project <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('portfolio') }}" class="btn-outline">View All Projects</a>
        </div>
    </div>
</section>

<div class="section-divider"></div>

{{-- Why Choose Us --}}
<section class="py-16 lg:py-24 bg-body relative">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] top-0 right-0 animate-pulse-glow"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <span class="tag mb-4">Why Us</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4 mb-6" style="font-family: 'Space Grotesk', sans-serif;">We Are a Team of Digital Experts</h2>
                <p class="text-muted leading-relaxed mb-8">
                    WeSolve Technologies is a full-service digital agency dedicated to transforming businesses through innovative web solutions, strategic marketing, and compelling brand experiences.
                </p>

                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 h-6 w-6 rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] flex items-center justify-center mt-0.5">
                            <svg class="h-3 w-3 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <h4 class="text-primary font-medium">Expert Team with Proven Track Record</h4>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 h-6 w-6 rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] flex items-center justify-center mt-0.5">
                            <svg class="h-3 w-3 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <h4 class="text-primary font-medium">Fast Delivery Without Compromising Quality</h4>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 h-6 w-6 rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] flex items-center justify-center mt-0.5">
                            <svg class="h-3 w-3 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <h4 class="text-primary font-medium">Solutions Tailored to Your Goals</h4>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 h-6 w-6 rounded-full bg-gradient-to-r from-[#305CDE] to-[#00B6DA] flex items-center justify-center mt-0.5">
                            <svg class="h-3 w-3 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <h4 class="text-primary font-medium">24/7 Support & Maintenance</h4>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="{{ route('contact') }}" class="btn-gradient">Work With Us</a>
                </div>
            </div>

            <div class="relative" data-aos="fade-left">
                <div class="glass-card p-4 sm:p-8 relative z-10 overflow-hidden">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="flex gap-1.5">
                            <div class="w-3 h-3 rounded-full bg-red-500/80"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500/80"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500/80"></div>
                        </div>
                    </div>
                    <div class="font-mono text-xs sm:text-sm overflow-x-auto">
                        <div class="text-[#00B6DA]">class <span class="text-yellow-400">WeSolve Technologies</span> <span class="text-primary">extends</span> <span class="text-yellow-400">DigitalAgency</span></div>
                        <div class="text-primary ml-4">{</div>
                        <div class="text-secondary ml-8">private <span class="text-[#00B6DA]">$mission</span> = <span class="text-green-400">"Transform ideas digital"</span>;</div>
                        <div class="text-secondary ml-8">private <span class="text-[#00B6DA]">$team</span> = [<span class="text-green-400">"Experts"</span>, <span class="text-green-400">"Creatives"</span>];</div>
                        <div class="text-secondary ml-8">private <span class="text-[#00B6DA]">$satisfaction</span> = <span class="text-orange-400">99</span>;</div>
                        <div class="text-primary ml-4">}</div>
                        <div class="text-muted mt-4">// Let's build something amazing together</div>
                    </div>
                </div>
                <div class="absolute -bottom-4 -right-4 w-full h-full glass-card -z-0"></div>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

{{-- Testimonials Slider --}}
<section class="py-16 lg:py-24 bg-body relative">
    <div class="bg-orb bg-orb-pink w-[400px] h-[400px] bottom-0 right-0 animate-pulse-glow" style="animation-delay: 2s;"></div>

    <div class="relative mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="tag mb-4">What Clients Say</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">Client Testimonials</h2>
            <p class="mt-4 text-muted">Real feedback from real clients who trusted us with their digital journey.</p>
        </div>

        <div class="testimonial-slider relative" data-aos="fade-up">
            <div class="testimonial-track overflow-hidden">
                <div class="testimonial-slides flex transition-transform duration-500 ease-out" id="testimonial-slides">
                    {{-- Slide 1 --}}
                    <div class="testimonial-slide w-full flex-shrink-0 px-2">
                        <div class="glass-card p-8 md:p-10 text-center max-w-2xl mx-auto">
                            <div class="flex justify-center gap-1 mb-6">
                                <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                            <svg class="h-8 w-8 text-[#305CDE]/40 mx-auto mb-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                            <p class="text-secondary italic leading-relaxed mb-8 text-base md:text-lg">"WeSolve Technologies transformed our travel business completely. The BookAcross platform they built handles thousands of daily bookings flawlessly. Their attention to detail and commitment to quality is unmatched."</p>
                            <div class="flex items-center justify-center gap-3">
                                <div class="h-12 w-12 rounded-full bg-gradient-to-br from-[#305CDE] to-[#00B6DA] flex items-center justify-center text-white font-semibold">RA</div>
                                <div class="text-left">
                                    <div class="text-primary text-sm font-medium">Ravi Anand</div>
                                    <div class="text-muted text-xs">CEO, BookAcross Travels</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Slide 2 --}}
                    <div class="testimonial-slide w-full flex-shrink-0 px-2">
                        <div class="glass-card p-8 md:p-10 text-center max-w-2xl mx-auto">
                            <div class="flex justify-center gap-1 mb-6">
                                <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                            <svg class="h-8 w-8 text-[#305CDE]/40 mx-auto mb-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                            <p class="text-secondary italic leading-relaxed mb-8 text-base md:text-lg">"The Crackers Shop app exceeded all expectations. Monthly subscription model works perfectly, and our customers love the seamless ordering experience. Revenue increased by 200% within the first quarter."</p>
                            <div class="flex items-center justify-center gap-3">
                                <div class="h-12 w-12 rounded-full bg-gradient-to-br from-[#305CDE] to-[#00B6DA] flex items-center justify-center text-white font-semibold">SK</div>
                                <div class="text-left">
                                    <div class="text-primary text-sm font-medium">Suresh Kumar</div>
                                    <div class="text-muted text-xs">Founder, Crackers Shop India</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Slide 3 --}}
                    <div class="testimonial-slide w-full flex-shrink-0 px-2">
                        <div class="glass-card p-8 md:p-10 text-center max-w-2xl mx-auto">
                            <div class="flex justify-center gap-1 mb-6">
                                <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="h-5 w-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                            <svg class="h-8 w-8 text-[#305CDE]/40 mx-auto mb-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                            <p class="text-secondary italic leading-relaxed mb-8 text-base md:text-lg">"Kesha Sri Collections EdTech platform is a game-changer. Students love the interactive courses and progress tracking. The admin panel makes content management incredibly easy. Highly recommended!"</p>
                            <div class="flex items-center justify-center gap-3">
                                <div class="h-12 w-12 rounded-full bg-gradient-to-br from-[#305CDE] to-[#00B6DA] flex items-center justify-center text-white font-semibold">KP</div>
                                <div class="text-left">
                                    <div class="text-primary text-sm font-medium">Kesha Priya</div>
                                    <div class="text-muted text-xs">Director, Kesha Sri Collections</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Slider Navigation --}}
            <button type="button" class="testimonial-nav-btn prev" id="testimonial-prev" aria-label="Previous testimonial">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </button>
            <button type="button" class="testimonial-nav-btn next" id="testimonial-next" aria-label="Next testimonial">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            {{-- Dots --}}
            <div class="testimonial-dots">
                <button type="button" class="testimonial-dot active" data-index="0" aria-label="Testimonial 1"></button>
                <button type="button" class="testimonial-dot" data-index="1" aria-label="Testimonial 2"></button>
                <button type="button" class="testimonial-dot" data-index="2" aria-label="Testimonial 3"></button>
            </div>
        </div>
    </div>
</section>

<div class="section-divider"></div>

{{-- Mobile App CTA Section --}}
<section class="py-16 lg:py-24 bg-body relative overflow-hidden">
    {{-- Background glow --}}
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] rounded-full bg-gradient-to-br from-[#305CDE]/10 via-[#00B6DA]/10 to-[#305CDE]/10 blur-3xl pointer-events-none"></div>
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] top-0 -right-40 animate-pulse-glow"></div>
    <div class="bg-orb bg-orb-blue w-[400px] h-[400px] bottom-0 -left-20 animate-pulse-glow" style="animation-delay: 2s;"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            {{-- Left: Phone Mockup --}}
            <div class="relative flex justify-center" data-aos="fade-right">
                {{-- Floating elements around phone --}}
                <div class="absolute -top-4 -left-4 lg:left-8 glass-card p-3 rounded-xl z-10 animate-float" style="animation-delay: 0s;">
                    <div class="flex items-center gap-2">
                        <div class="h-8 w-8 rounded-lg bg-gradient-to-br from-[#305CDE] to-[#00B6DA] flex items-center justify-center">
                            <svg class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <div class="text-xs text-primary font-medium">iOS & Android</div>
                            <div class="text-[10px] text-muted">Native Apps</div>
                        </div>
                    </div>
                </div>

                <div class="absolute top-20 -right-4 lg:right-0 glass-card p-3 rounded-xl z-10 animate-float" style="animation-delay: 1s;">
                    <div class="flex items-center gap-2">
                        <div class="h-8 w-8 rounded-lg bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center">
                            <svg class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                        </div>
                        <div>
                            <div class="text-xs text-primary font-medium">Flutter</div>
                            <div class="text-[10px] text-muted">Cross-Platform</div>
                        </div>
                    </div>
                </div>

                <div class="absolute -bottom-4 left-4 lg:left-12 glass-card p-3 rounded-xl z-10 animate-float" style="animation-delay: 2s;">
                    <div class="flex items-center gap-2">
                        <div class="h-8 w-8 rounded-lg bg-gradient-to-br from-orange-500 to-red-600 flex items-center justify-center">
                            <svg class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <div>
                            <div class="text-xs text-primary font-medium">Fast Performance</div>
                            <div class="text-[10px] text-muted">60 FPS Smooth</div>
                        </div>
                    </div>
                </div>

                {{-- Phone Frame --}}
                <div class="relative w-[280px] h-[560px] rounded-[40px] border-4 border-white/10 bg-gradient-to-b from-white/5 to-white/[0.02] p-3 shadow-2xl shadow-[#305CDE]/10 backdrop-blur-sm">
                    <div class="w-full h-full rounded-[32px] bg-gradient-to-b from-[#1a1a2e] to-[#0a0a0a] overflow-hidden relative">
                        {{-- Notch --}}
                        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-24 h-6 bg-black rounded-b-2xl z-20"></div>

                        {{-- App UI --}}
                        <div class="p-5 pt-10 h-full flex flex-col">
                            {{-- App Header --}}
                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center gap-2">
                                    <div class="h-8 w-8 rounded-xl bg-gradient-to-br from-[#305CDE] to-[#00B6DA] flex items-center justify-center">
                                        <svg class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                                    </div>
                                    <span class="text-white text-sm font-semibold">WeSolve Technologies</span>
                                </div>
                                <div class="h-8 w-8 rounded-full bg-white/10 flex items-center justify-center">
                                    <svg class="h-4 w-4 text-white/60" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                                </div>
                            </div>

                            {{-- Welcome Card --}}
                            <div class="rounded-2xl bg-gradient-to-br from-[#305CDE]/20 to-[#00B6DA]/20 border border-[#305CDE]/20 p-4 mb-4">
                                <div class="text-white/50 text-[10px] mb-1">Welcome back</div>
                                <div class="text-white text-sm font-semibold mb-2">Build Your Dream App</div>
                                <div class="text-white/50 text-[10px]">iOS · Android · Flutter</div>
                            </div>

                            {{-- Service Cards --}}
                            <div class="space-y-3 flex-1">
                                <div class="flex items-center gap-3 p-3 rounded-xl bg-white/5">
                                    <div class="h-8 w-8 rounded-lg bg-[#305CDE]/20 flex items-center justify-center flex-shrink-0">
                                        <svg class="h-4 w-4 text-[#305CDE]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                                    </div>
                                    <div>
                                        <div class="text-white text-xs font-medium">Mobile App Dev</div>
                                        <div class="text-white/40 text-[10px]">Native & Cross-Platform</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3 p-3 rounded-xl bg-white/5">
                                    <div class="h-8 w-8 rounded-lg bg-[#00B6DA]/20 flex items-center justify-center flex-shrink-0">
                                        <svg class="h-4 w-4 text-[#00B6DA]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                    </div>
                                    <div>
                                        <div class="text-white text-xs font-medium">UI/UX Design</div>
                                        <div class="text-white/40 text-[10px]">Modern Interfaces</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3 p-3 rounded-xl bg-white/5">
                                    <div class="h-8 w-8 rounded-lg bg-[#00B6DA]/20 flex items-center justify-center flex-shrink-0">
                                        <svg class="h-4 w-4 text-[#00B6DA]" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                    </div>
                                    <div>
                                        <div class="text-white text-xs font-medium">API Integration</div>
                                        <div class="text-white/40 text-[10px]">Secure Backend</div>
                                    </div>
                                </div>
                            </div>

                            {{-- Bottom CTA --}}
                            <div class="mt-auto pt-3">
                                <div class="w-full py-3 rounded-xl bg-gradient-to-r from-[#305CDE] to-[#00B6DA] text-white text-xs font-semibold text-center">
                                    Get Free Quote
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: Contact Content --}}
            <div class="text-center lg:text-left" data-aos="fade-left">
                <span class="tag mb-4">Mobile App Development</span>
                <h2 class="text-3xl lg:text-5xl font-bold text-primary mt-4 mb-6 leading-tight" style="font-family: 'Space Grotesk', sans-serif;">
                    Turn Your Idea Into a <span class="gradient-text">Powerful App</span>
                </h2>
                <p class="text-lg text-muted mb-8 max-w-lg mx-auto lg:mx-0">
                    We build high-performance mobile applications for iOS and Android using Flutter, React Native, and native technologies. From concept to launch, we handle everything.
                </p>

                <div class="grid grid-cols-2 gap-4 mb-8 max-w-md mx-auto lg:mx-0">
                    <div class="glass-card p-4 text-center">
                        <div class="text-2xl font-bold gradient-text mb-1">iOS</div>
                        <div class="text-xs text-muted">Native Swift</div>
                    </div>
                    <div class="glass-card p-4 text-center">
                        <div class="text-2xl font-bold gradient-text mb-1">Android</div>
                        <div class="text-xs text-muted">Native Kotlin</div>
                    </div>
                </div>

                <div class="flex flex-row flex-wrap gap-4 justify-center lg:justify-start">
                    <a href="{{ route('contact') }}" class="btn-gradient text-base py-3.5 px-8 whitespace-nowrap">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="h-5 w-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                            Discuss Your App Idea
                        </span>
                    </a>
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', \App\Models\Setting::get('contact_phone', '+1234567890')) }}" target="_blank" rel="noopener noreferrer" class="btn-outline text-base py-3.5 px-8 whitespace-nowrap">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="h-5 w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.008-.57-.008-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            WhatsApp Us
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Blog Preview --}}
@if($blogs->count() > 0)
<div class="section-divider"></div>

<section class="py-16 lg:py-24 bg-body relative">
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="tag mb-4">Insights</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">Latest Articles</h2>
            <p class="mt-4 text-muted">Tips, trends, and insights from our team of experts.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($blogs as $index => $blog)
            <article class="group glass-card-hover overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                @if($blog->featured_image)
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy" width="400" height="192" decoding="async">
                </div>
                @endif
                <div class="p-6">
                    <time class="text-xs text-muted-light">{{ $blog->published_at?->format('M d, Y') }}</time>
                    <h3 class="mt-2 text-lg font-semibold text-primary group-hover:text-[#305CDE] transition" style="font-family: 'Space Grotesk', sans-serif;">{{ $blog->title }}</h3>
                    <p class="mt-2 text-sm text-muted">{{ $blog->excerpt }}</p>
                    <a href="{{ route('blog.show', $blog->slug) }}" class="mt-4 inline-flex items-center text-sm text-muted hover:text-[#305CDE] transition gap-1">
                        Read more <span>→</span>
                    </a>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
