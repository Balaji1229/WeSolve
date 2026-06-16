<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/logo/wesolvetechnologies-favicon.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/logo/wesolvetechnologies-favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo/wesolvetechnologies-favicon.png') }}">

    <title>@yield('title', 'Admin Dashboard') | WeSolve Technologies</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet"></noscript>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @include('components.dynamic-styles')
</head>
<body class="light">
    <div class="flex h-screen overflow-hidden">
        @include('components.admin-sidebar')

        <div class="flex-1 flex flex-col overflow-hidden">
            @include('components.admin-header')

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-body p-6" id="admin-main-content">
                @if(session('success'))
                    <div class="mb-4 rounded-xl bg-green-500/10 border border-green-500/20 px-4 py-3 text-green-400 text-sm" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 rounded-xl bg-red-500/10 border border-red-500/20 px-4 py-3 text-red-400 text-sm" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
