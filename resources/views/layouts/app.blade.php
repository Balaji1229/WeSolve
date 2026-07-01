<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="@yield('robots', config('seo.indexable', true) ? 'index, follow' : 'noindex, nofollow')">
    <meta name="theme-color" content="#0a0a0a" media="(prefers-color-scheme: dark)">
    <meta name="theme-color" content="#f8f9fa" media="(prefers-color-scheme: light)">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/logo/wesolvetechnologies-favicon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo/wesolvetechnologies-favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo/wesolvetechnologies-favicon.png') }}">

    @php
        $routeName = Route::currentRouteName() ?? 'home';
        $pageSeo = \App\Models\PageSeo::where('page', $routeName)->first();
        $metaTitle = $pageSeo?->meta_title ?? \App\Models\Setting::get('site_title', 'WeSolve Technologies - Affordable Website & App Development');
        $metaDescription = $pageSeo?->meta_description ?? \App\Models\Setting::get('site_description', 'Professional website development, web apps, SEO and maintenance services at affordable prices.');
        $metaKeywords = $pageSeo?->meta_keywords ?? \App\Models\Setting::get('site_keywords', 'website development, web app development, SEO, maintenance, affordable');
        $ogImage = $pageSeo?->og_image ? asset('storage/' . $pageSeo->og_image) : asset('images/logo/wesolvetechnologies-dark.webp');
    @endphp

    <title>@yield('title', $metaTitle)</title>
    <meta name="description" content="@yield('meta_description', $metaDescription)">
    <meta name="keywords" content="@yield('meta_keywords', $metaKeywords)">

    {{-- Canonical URL --}}
    <link rel="canonical" href="@hasSection('canonical')@yield('canonical')@else{{ url()->current() }}@endif">    @hasSection('meta_extra')
        @yield('meta_extra')
    @else
        {{-- Open Graph --}}
        <meta property="og:site_name" content="WeSolve Technologies">
        <meta property="og:title" content="@yield('title', $metaTitle)">
        <meta property="og:description" content="@yield('meta_description', $metaDescription)">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ $ogImage }}">
        <meta property="og:locale" content="en_US">

        {{-- Twitter Card --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@yield('title', $metaTitle)">
        <meta name="twitter:description" content="@yield('meta_description', $metaDescription)">
        <meta name="twitter:image" content="{{ $ogImage }}">
    @endif

    {{-- WebPage Schema --}}
    @php
        $webPageSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => $metaTitle,
            'description' => $metaDescription,
            'url' => url()->current(),
            'image' => $ogImage,
        ];
    @endphp
    <script type="application/ld+json">
    {!! json_encode($webPageSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
    </script>

    {{-- Resource Hints --}}
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="dns-prefetch" href="https://unpkg.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    {{-- Fonts --}}
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet"></noscript>

    {{-- AOS CSS --}}
    <link rel="preload" href="https://unpkg.com/aos@2.3.1/dist/aos.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"></noscript>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dynamic-styles')
</head>
<body class="light">
    {{-- Skip to content link for accessibility --}}
    <a href="#main-content" id="skip-to-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[60] focus:bg-[#305CDE] focus:text-white focus:px-4 focus:py-2 focus:rounded-lg focus:text-sm focus:font-medium">
        Skip to main content
    </a>

    @include('components.navbar')

    <main id="main-content" class="bg-body transition-colors duration-300">
        @yield('content')

        {{-- Auto-render page-level FAQs entered via /admin/seo (FAQ section + FAQPage schema) --}}
        @if(!empty($pageSeo?->faqs))
            <x-faq-section :faqs="$pageSeo->faqs" />
        @endif
    </main>

    @include('components.footer')

    {!! \App\Helpers\SeoHelper::schemaOrganization() !!}
    {!! \App\Helpers\SeoHelper::schemaWebsite() !!}
    @yield('schema_extra')

    {{-- AOS JS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script>
        window.addEventListener('load', function() {
            if (typeof AOS !== 'undefined') {
                AOS.init({ duration: 800, once: true, offset: 50 });
            }
        });
    </script>
    @include('components.whatsapp-float')
    @include('components.ai-chatbot-float')

    @stack('scripts')
</body>
</html>
