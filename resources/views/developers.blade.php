@extends('layouts.app')

@section('title', 'Our Developers - Expert Team | WeSolve Technologies')

@section('content')
@php
$developers = [
    [
        'name'      => 'Selva',
        'role'      => 'Backend & PHP Developer',
        'exp'       => '6+ Years Experience',
        'image'     => 'images/developers/selva.jpg',
        'email'     => 'selvasandy2930@gmail.com',
        'skills'    => ['PHP', 'Laravel', 'CodeIgniter', 'Node.js', 'MySQL', 'React', 'REST APIs', 'Magento', 'SEO'],
        'summary'   => 'Experienced backend developer with a strong track record building inventory systems, e-commerce platforms, and SEO-optimized web applications.',
        'highlights'=> [
            'Backend Developer — Built Node.js backend for an inventory management system (React/MySQL)',
            'Handled backend logic, inventory updates, and vendor management modules',
            'PHP Developer (Magento) — Built and maintained web apps using Core PHP, Laravel, and CodeIgniter',
            'Created SEO-optimized websites for clients, boosting organic traffic by 25%',
            'Experienced in creating APIs and implementing admin dashboard functionality using Laravel',
        ],
    ],
    [
        'name'      => 'Nanthini',
        'role'      => 'Full Stack Developer',
        'exp'       => '5+ Years Experience',
        'image'     => 'images/developers/nanthini.jpg',
        'email'     => 'nanthini7596@gmail.com',
        'skills'    => ['PHP', 'Node.js', 'Laravel', 'CodeIgniter', 'Angular', 'MySQL', 'MongoDB', 'REST APIs', 'cPanel', 'AWS'],
        'summary'   => 'Skilled full stack developer specializing in Laravel and Node.js, with deep expertise in scalable architecture, API development, and server management.',
        'highlights'=> [
            'Crafted and managed numerous web applications using Laravel and Node.js with performance and scalability as top priorities',
            'Collaborated with designers and frontend developers to implement responsive, user-friendly interfaces',
            'Proficient in CodeIgniter for robust and efficient application development',
            'Created modular APIs in Node.js, contributing to overall system agility',
            'Hands-on experience in server-side management using cPanel on GoDaddy and AWS',
        ],
    ],
    [
        'name'      => 'Balaji',
        'role'      => 'Laravel & PHP Developer',
        'exp'       => '4+ Years Experience',
        'image'     => 'images/developers/balaji.png',
        'email'     => 'balajinagaraj9876@gmail.com',
        'skills'    => ['PHP', 'Laravel', 'React', 'WordPress', 'HTML', 'CSS', 'Bootstrap', 'JavaScript', 'Livewire', 'Tailwind CSS'],
        'summary'   => 'Laravel & PHP Developer with 4 years of experience building scalable web applications and e-commerce platforms, delivering high-performance, SEO-optimized solutions.',
        'highlights'=> [
            'Built scalable web applications and e-commerce platforms using Laravel and PHP',
            'Skilled in MySQL, WordPress, and API integration with a focus on performance',
            'Proven record of delivering high-performance, SEO-optimized solutions',
            'Adept at both backend and frontend development',
        ],
    ],
    [
        'name'      => 'Kanishka',
        'role'      => 'Flutter Developer',
        'exp'       => '4+ Years Experience',
        'image'     => 'images/developers/kanishka.jpg',
        'email'     => 'kanishkajegathish@gmail.com',
        'skills'    => ['Flutter', 'Dart', 'RESTful APIs', 'JSON Parsing', 'JWT Authentication', 'OTP Authentication', 'Socket.IO', 'Firebase', 'Riverpod'],
        'summary'   => 'Flutter Developer with 4+ years of experience designing and developing scalable Android and iOS applications using Flutter and Dart.',
        'highlights'=> [
            'Built large-scale e-commerce marketplace platforms and seller management systems',
            'Implemented real-time communication features, payment integrations, push notifications, and multilingual support',
            'Strong expertise in Riverpod state management, REST API integration, Firebase, and Socket.IO',
            'Delivered production-ready applications with clean architecture, optimized performance, and comprehensive testing',
        ],
    ],
    [
        'name'      => 'Prasanth',
        'role'      => 'PHP & Laravel Developer',
        'exp'       => '3+ Years Experience',
        'image'     => 'images/developers/prasanth.jpg',
        'email'     => 'prasanthvedagiri28@gmail.com',
        'skills'    => ['PHP', 'Laravel', 'MySQL', 'cPanel', 'Domain Management', 'Web Hosting', 'Server Management', 'Website Migration'],
        'summary'   => 'Detail-oriented PHP Developer with 3+ years of experience in Core PHP and the Laravel framework, skilled in dynamic web applications and server operations.',
        'highlights'=> [
            'Developed dynamic web applications and built efficient backend systems',
            'Experienced in database design, optimization, and management',
            'Managed server operations including cPanel handling, domain transfer, and website migration',
            'Handled hosting setup and resolved domain-related issues',
            'Ensured smooth website deployment and maintenance across projects',
        ],
    ],
    [
        'name'      => 'Arthy',
        'role'      => 'Junior Laravel Developer',
        'exp'       => '1+ Years Experience',
        'image'     => 'images/developers/arthy.jpg',
        'email'     => 'shweetharthy18@gmail.com',
        'skills'    => ['PHP', 'Laravel', 'CodeIgniter', 'MySQL', 'HTML', 'CSS', 'REST APIs', 'MVC'],
        'summary'   => 'Junior Laravel Developer with 1 year of hands-on experience building backend-driven web applications, authentication systems, and RESTful APIs.',
        'highlights'=> [
            'Built authentication systems and role-based access control in Laravel',
            'Developed RESTful APIs and CRUD operations for web applications',
            'Worked on real-time ERP and ticket management systems',
            'Passionate about writing clean, efficient code and continuously improving backend solutions',
        ],
    ],
    [
        'name'      => 'Ramkumar',
        'role'      => 'App Developer',
        'exp'       => '2+ Years Experience',
        'image'     => 'images/developers/ram.png',
        'email'     => 'ramkumarchandrasekar12@gmail.com',
        'skills'    => [],
        'summary'   => 'I am a dedicated Flutter developer who is passionate about creating impactful mobile experiences that delight users and drive business success. I am excited about the opportunity to contribute my expertise to innovative projects and collaborate with like-minded professionals in the field.',
        'highlights'=> [
            'Designs intuitive and user-friendly mobile interfaces with a strong focus on UI/UX principles',
            'Integrates RESTful APIs seamlessly to connect apps with powerful backend services',
            'Implements Firebase services including authentication, cloud messaging, and real-time databases',
            'Performs thorough testing and debugging to ensure stable, production-ready applications',
            'Optimizes app performance for faster load times, smoother animations, and better resource usage',
        ],
    ],
    [
        'name'      => 'Sanjay',
        'role'      => 'Digital Marketing Analyst',
        'exp'       => '1+ Years Experience',
        'image'     => 'images/developers/sanjay.png',
        'email'     => 'sanjairoy112@gmail.com',
        'skills'    => ['On-Page SEO', 'Off-Page SEO', 'Technical SEO', 'Google Search Console', 'Google Analytics 4', 'Google Tag Manager', 'Ahrefs', 'SEMrush', 'Sitemap', 'Robots.txt', 'Instant Indexing API', 'Email Marketing', 'SMO', 'Canva'],
        'summary'   => 'Digital Marketing Analyst with 1+ years of experience in SEO, SMO, and website analysis, proficient in leading analytics and rank-monitoring tools.',
        'highlights'=> [
            'Strong understanding of SEO and SMO techniques with hands-on website analysis experience',
            'Proficient in Google Search Console, Google Analytics 4, and Google Tag Manager',
            'Experienced with rank monitoring tools, Keyword Planner, Ahrefs, and SEMrush',
            'Skilled in technical SEO tasks including sitemap creation, robots.txt optimization, and Instant Indexing API',
            'Capable in email marketing, social media optimization, and visual design with Canva',
        ],
    ],
];
@endphp

{{-- Hero --}}
<section class="relative overflow-hidden bg-body pt-16 pb-20 lg:pt-24 lg:pb-28" aria-labelledby="dev-hero-heading">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] -top-40 -right-40 animate-pulse-glow"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <span class="tag mb-4">Our Team</span>
        <h1 id="dev-hero-heading" class="text-4xl lg:text-6xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
            Meet Our <span class="gradient-text">Developers</span>
        </h1>
        <p class="mt-6 text-lg text-muted max-w-3xl mx-auto">
            Discover the skilled professionals behind WeSolve Technologies — Laravel, Flutter, Node.js, and digital marketing experts dedicated to building exceptional digital experiences.
        </p>
    </div>
</section>

<div class="section-divider"></div>

<style>
    .dev-img-col { width: 100%; }
    @media (min-width: 768px) {
        .dev-img-col { width: 45%; flex-shrink: 0; }
    }

    .developers-img{
        width:100% !important;
    }
</style>

{{-- Developer Sections --}}
<div class="bg-body relative">
    @foreach($developers as $index => $dev)
        @php
            $sectionId = 'developer-' . Str::slug($dev['name']);
        @endphp

        <section id="{{ $sectionId }}" class="py-12 lg:py-16 relative" aria-labelledby="{{ $sectionId }}-heading">
            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <article class="flex flex-col md:flex-row gap-8 lg:gap-10 items-start glass-card-hover rounded-3xl border border-white/10 shadow-xl shadow-black/20 p-6 lg:p-8" itemscope itemtype="https://schema.org/Person">
                    {{-- Image Column --}}
                    <div class="dev-img-col self-start" data-aos="fade-right">
                        <figure class="developers-img relative aspect-[3/4] w-56 md:w-64 lg:w-72 overflow-hidden rounded-2xl border border-white/10 shadow-lg group">
                            <img
                                src="{{ asset($dev['image']) }}"
                                alt="{{ $dev['name'] }} — {{ $dev['role'] }} at WeSolve Technologies"
                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105"
                                loading="lazy"
                                decoding="async"
                                width="320"
                                height="427"
                                itemprop="image"
                            >
                        </figure>
                    </div>

                    {{-- Content Column --}}
                    <div class="flex-1 self-start" data-aos="fade-left">
                        <header>
                            <span class="tag mb-3 inline-block">{{ $dev['exp'] }}</span>
                            <h2 id="{{ $sectionId }}-heading" class="text-2xl lg:text-3xl font-bold text-primary" style="font-family: 'Space Grotesk', sans-serif;" itemprop="name">
                                {{ $dev['name'] }}
                            </h2>
                            <p class="mt-2 text-lg font-medium text-[#305CDE]" itemprop="jobTitle">
                                {{ $dev['role'] }}
                            </p>
                        </header>

                        <p class="mt-5 text-muted leading-relaxed" itemprop="description">
                            {{ $dev['summary'] }}
                        </p>

                        <ul class="mt-6 space-y-3">
                            @foreach($dev['highlights'] as $highlight)
                                <li class="flex items-start text-sm text-muted">
                                    <svg class="h-5 w-5 text-[#305CDE] mr-3 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    <span>{{ $highlight }}</span>
                                </li>
                            @endforeach
                        </ul>

                        {{-- Skills --}}
                        @if(!empty($dev['skills']))
                        <div class="mt-6">
                            <h3 class="text-sm font-semibold text-primary uppercase tracking-wider mb-3">Skills</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($dev['skills'] as $skill)
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-[#305CDE]/10 text-[#305CDE] border border-[#305CDE]/20">
                                        {{ $skill }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        {{-- Email --}}
                        <div class="mt-8">
                            <a
                                href="mailto:{{ $dev['email'] }}"
                                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full border border-[#305CDE]/30 bg-[#305CDE]/10 text-[#305CDE] text-sm font-medium hover:bg-[#305CDE]/20 hover:border-[#305CDE]/50 hover:text-[#00B6DA] transition-colors shadow-sm"
                                itemprop="email"
                            >
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                {{ $dev['email'] }}
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </section>

        @if(!$loop->last)
            <div class="section-divider"></div>
        @endif
    @endforeach
</div>
@endsection

@section('schema_extra')
@php
$schemaPeople = array_map(function($dev) {
    return [
        '@context' => 'https://schema.org',
        '@type' => 'Person',
        'name' => $dev['name'],
        'jobTitle' => $dev['role'],
        'description' => $dev['summary'],
        'image' => asset($dev['image']),
        'email' => $dev['email'],
        'worksFor' => [
            '@type' => 'Organization',
            'name' => 'WeSolve Technologies',
            'url' => url('/'),
        ],
        'knowsAbout' => $dev['skills'],
    ];
}, $developers);
@endphp
<script type="application/ld+json">
{!! json_encode($schemaPeople, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
</script>
@endsection
