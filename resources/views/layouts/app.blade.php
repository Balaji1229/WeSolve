<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="robots" content="index, follow">
    <meta name="theme-color" content="#0a0a0a" media="(prefers-color-scheme: dark)">
    <meta name="theme-color" content="#f8f9fa" media="(prefers-color-scheme: light)">

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/freelancers4u.svg') }}">
    <link rel="shortcut icon" type="image/svg+xml" href="{{ asset('images/freelancers4u.svg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/freelancers4u.svg') }}">

    <title>@yield('title', \App\Models\Setting::get('site_title', 'Freelancers4U - Affordable Website & App Development'))</title>
    <meta name="description" content="@yield('meta_description', \App\Models\Setting::get('site_description', 'Professional website development, web apps, SEO and maintenance services at affordable prices.'))">
    <meta name="keywords" content="@yield('meta_keywords', \App\Models\Setting::get('site_keywords', 'website development, web app development, SEO, maintenance, affordable'))">

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url()->current() }}">

    @hasSection('meta_extra')
        @yield('meta_extra')
    @else
        {{-- Default Open Graph --}}
        <meta property="og:site_name" content="Freelancers4U">
        <meta property="og:title" content="@yield('title', \App\Models\Setting::get('site_title', 'Freelancers4U'))">
        <meta property="og:description" content="@yield('meta_description', \App\Models\Setting::get('site_description', 'Professional website development, web apps, SEO and maintenance services at affordable prices.'))">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:image" content="{{ asset('images/freelancers4u.svg') }}">
        <meta property="og:locale" content="en_US">

        {{-- Default Twitter Card --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@yield('title', \App\Models\Setting::get('site_title', 'Freelancers4U'))">
        <meta name="twitter:description" content="@yield('meta_description', \App\Models\Setting::get('site_description', 'Professional website development, web apps, SEO and maintenance services at affordable prices.'))">
        <meta name="twitter:image" content="{{ asset('images/freelancers4u.svg') }}">
    @endif

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
</head>
<body class="dark">
    {{-- Skip to content link for accessibility --}}
    <a href="#main-content" id="skip-to-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[60] focus:bg-indigo-600 focus:text-white focus:px-4 focus:py-2 focus:rounded-lg focus:text-sm focus:font-medium">
        Skip to main content
    </a>

    @include('components.navbar')

    <main id="main-content" class="bg-body transition-colors duration-300">
        @yield('content')
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
    @stack('scripts')
</body>
</html>
