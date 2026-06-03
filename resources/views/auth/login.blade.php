<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin Login - Freelancers4U</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet"></noscript>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-[#0a0a0a] min-h-screen flex items-center justify-center relative overflow-hidden">
    <div class="bg-orb bg-orb-purple w-[600px] h-[600px] top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 animate-pulse-glow"></div>

    <div class="relative w-full max-w-md p-8 glass-card">
        <div class="text-center mb-8">
            <div class="flex items-center justify-center gap-2 text-xl font-bold mb-6" style="font-family: 'Space Grotesk', sans-serif;">
                <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600" aria-hidden="true">
                    <svg class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                    </svg>
                </div>
                <span class="gradient-text">Freelancers4U</span>
            </div>
            <h1 class="text-2xl font-bold text-white" style="font-family: 'Space Grotesk', sans-serif;">Admin Login</h1>
            <p class="mt-2 text-white/50">Sign in to your account</p>
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
                <label for="email" class="block text-sm font-medium text-white/70 mb-2">Email</label>
                <input type="email" name="email" id="email" required class="w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition" placeholder="admin@freelancers4u.com" autocomplete="email">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-white/70 mb-2">Password</label>
                <input type="password" name="password" id="password" required class="w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition" autocomplete="current-password">
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded bg-white/5 border-white/10 text-indigo-500 focus:ring-indigo-500/50">
                    <span class="text-sm text-white/50">Remember me</span>
                </label>
            </div>

            <button type="submit" class="w-full btn-gradient">Sign In</button>
        </form>
    </div>
</body>
</html>
