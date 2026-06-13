<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login - WeSolve Technologies</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo/wesolvetechnologies-favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo/wesolvetechnologies-favicon.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet"></noscript>
    @vite(['resources/css/app.css'])
    <script>
        (function () {
            const savedTheme = localStorage.getItem('theme');
            const isDark = savedTheme ? savedTheme === 'dark' : false;
            document.documentElement.classList.toggle('dark', isDark);
            document.documentElement.classList.toggle('light', !isDark);
            document.body && document.body.classList.toggle('dark', isDark);
            document.body && document.body.classList.toggle('light', !isDark);
        })();
    </script>
</head>
<body class="bg-body min-h-screen flex items-center justify-center relative overflow-hidden">
    <div class="bg-orb bg-orb-purple w-[600px] h-[600px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 animate-pulse-glow"></div>

    <div class="relative w-full max-w-md p-8 glass-card">
        <div class="text-center mb-8">
            <div class="flex items-center justify-center gap-2 text-xl font-bold mb-6" style="font-family: 'Space Grotesk', sans-serif;">
                @include('components.logo', ['height' => 100])
            </div>
            <h1 class="text-2xl font-bold text-primary" style="font-family: 'Space Grotesk', sans-serif;">Admin Login</h1>
            <p class="mt-2 text-secondary">Sign in to your account</p>
        </div>

        @if ($errors->any())
        <div class="mb-6 rounded-xl bg-red-500/10 border border-red-500/20 px-4 py-3 text-red-400 text-sm" role="alert">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-secondary mb-2">Email</label>
                <input type="email" name="email" id="email" required class="w-full rounded-xl input-bg px-4 py-3 text-sm focus:outline-none focus:border-[#305CDE]/50 focus:ring-2 focus:ring-[#305CDE]/10 transition" placeholder="admin@wesolvetechnologies.com" autocomplete="email">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-secondary mb-2">Password</label>
                <input type="password" name="password" id="password" required class="w-full rounded-xl input-bg px-4 py-3 text-sm focus:outline-none focus:border-[#305CDE]/50 focus:ring-2 focus:ring-[#305CDE]/10 transition" autocomplete="current-password">
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded input-bg border-theme text-[#305CDE] focus:ring-[#305CDE]/50">
                    <span class="text-sm text-secondary">Remember me</span>
                </label>
            </div>

            <button type="submit" class="w-full btn-gradient">Sign In</button>
        </form>
    </div>
</body>
</html>
