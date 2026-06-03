<header class="bg-[#111111] border-b border-white/[0.06] px-6 py-4">
    <div class="flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white" style="font-family: 'Space Grotesk', sans-serif;">@yield('page_title', 'Dashboard')</h1>
        <div class="flex items-center gap-4">
            <span class="text-sm text-white/50">{{ auth()->user()->name }}</span>
            <div class="h-8 w-8 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-xs font-semibold">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
        </div>
    </div>
</header>
