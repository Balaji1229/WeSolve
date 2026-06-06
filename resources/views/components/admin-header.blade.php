<header class="bg-body border-b border-theme px-6 py-4">
    <div class="flex items-center justify-between">
        <h1 class="text-xl font-semibold text-primary" style="font-family: 'Space Grotesk', sans-serif;">@yield('page_title', 'Dashboard')</h1>
        <div class="flex items-center gap-4">
            <button id="admin-theme-toggle" class="rounded-lg p-2 transition min-h-[44px] min-w-[44px] flex items-center justify-center text-muted hover:text-primary" title="Toggle theme" aria-label="Toggle dark/light theme">
                <svg id="admin-sun-icon" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
                <svg id="admin-moon-icon" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                </svg>
            </button>

            <span class="text-sm text-muted">{{ auth()->user()->name }}</span>
            <div class="h-8 w-8 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-xs font-semibold">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
        </div>
    </div>
</header>
