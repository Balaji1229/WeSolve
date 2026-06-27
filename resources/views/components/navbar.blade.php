<nav class="fixed top-0 z-50 w-full border-b border-theme backdrop-blur-xl bg-body/80" aria-label="Main navigation">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 md:h-24 lg:h-32 items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-2 text-xl font-bold" style="font-family: 'Space Grotesk', sans-serif;" aria-label="WeSolve Technologies Home">
                @include('components.logo', ['height' => 80])
            </a>

            <div class="hidden md:flex items-center gap-1">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }} px-4 py-2 text-sm font-medium transition-colors rounded-lg" {{ request()->routeIs('home') ? 'aria-current=page' : '' }}>Home</a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }} px-4 py-2 text-sm font-medium transition-colors rounded-lg" {{ request()->routeIs('about') ? 'aria-current=page' : '' }}>About Us</a>

                <!-- Services with Dropdown -->
                <div class="relative">
                    <a href="{{ route('services') }}" id="services-dropdown-link" class="nav-link {{ request()->routeIs('services*') ? 'active' : '' }} px-4 py-2 text-sm font-medium transition-colors rounded-lg inline-flex items-center gap-1" aria-haspopup="true" aria-expanded="false" {{ request()->routeIs('services*') ? 'aria-current=page' : '' }}>
                        Services
                        <svg class="h-3.5 w-3.5 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </a>
                    <div id="services-dropdown-menu" class="hidden absolute top-full left-0 mt-1 w-64 dropdown-menu py-2 px-2 z-50" role="menu" aria-label="Services submenu">
                        <a href="{{ route('service.website-development') }}" class="dropdown-item" role="menuitem">Website Development</a>
                        <a href="{{ route('service.web-application-development') }}" class="dropdown-item" role="menuitem">Web Application Development</a>
                        <a href="{{ route('service.mobile-app-development') }}" class="dropdown-item" role="menuitem">Mobile App Development</a>
                        <a href="{{ route('service.digital-marketing') }}" class="dropdown-item" role="menuitem">Digital Marketing</a>
                        <a href="{{ route('service.ai-automation-solutions') }}" class="dropdown-item" role="menuitem">AI &amp; Automation Solutions</a>
                        <a href="{{ route('service.ui-ux-design') }}" class="dropdown-item" role="menuitem">UI/UX Design</a>
                        <a href="{{ route('service.cloud-solutions') }}" class="dropdown-item" role="menuitem">Cloud Solutions</a>
                        <a href="{{ route('service.maintenance-support') }}" class="dropdown-item" role="menuitem">Maintenance &amp; Support</a>
                        <div class="border-t border-theme my-1"></div>
                        <a href="{{ route('services') }}" class="dropdown-item font-medium text-[#305CDE]" role="menuitem">
                            View All Services →
                        </a>
                    </div>
                </div>

                <a href="{{ route('portfolio') }}" class="nav-link {{ request()->routeIs('portfolio*') ? 'active' : '' }} px-4 py-2 text-sm font-medium transition-colors rounded-lg" {{ request()->routeIs('portfolio*') ? 'aria-current=page' : '' }}>Portfolio</a>
                <a href="{{ route('templates') }}" class="nav-link {{ request()->routeIs('templates') ? 'active' : '' }} px-4 py-2 text-sm font-medium transition-colors rounded-lg" {{ request()->routeIs('templates') ? 'aria-current=page' : '' }}>Templates</a>
                <a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }} px-4 py-2 text-sm font-medium transition-colors rounded-lg" {{ request()->routeIs('contact') ? 'aria-current=page' : '' }}>Contact</a>
            </div>

            <div class="flex items-center gap-3">
                <!-- Theme Toggle -->
                <button id="theme-toggle" class="rounded-lg p-2 transition min-h-[44px] min-w-[44px] flex items-center justify-center" title="Toggle theme" aria-label="Toggle dark/light theme">
                    <svg id="sun-icon" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <svg id="moon-icon" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                    </svg>
                </button>

                <a href="{{ route('contact') }}" id="get-start" class="hidden lg:inline-flex btn-gradient text-sm py-2.5 px-6">Get Started</a>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden rounded-lg p-2 transition min-h-[44px] min-w-[44px] flex items-center justify-center" aria-label="Open mobile menu" aria-expanded="false" aria-controls="mobile-menu">
                    <svg id="menu-open-icon" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="menu-close-icon" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-theme bg-body/95 backdrop-blur-xl" role="dialog" aria-label="Mobile menu" aria-modal="true">
        <div class="px-4 py-3 space-y-1">
            <a href="{{ route('home') }}" class="nav-link block rounded-lg px-3 py-3 text-base min-h-[44px] flex items-center transition" {{ request()->routeIs('home') ? 'aria-current=page' : '' }}>Home</a>
            <a href="{{ route('about') }}" class="nav-link block rounded-lg px-3 py-3 text-base min-h-[44px] flex items-center transition" {{ request()->routeIs('about') ? 'aria-current=page' : '' }}>About Us</a>
            <a href="{{ route('services') }}" class="nav-link block rounded-lg px-3 py-3 text-base min-h-[44px] flex items-center transition" {{ request()->routeIs('services*') ? 'aria-current=page' : '' }}>Services</a>
            <a href="{{ route('portfolio') }}" class="nav-link block rounded-lg px-3 py-3 text-base min-h-[44px] flex items-center transition" {{ request()->routeIs('portfolio*') ? 'aria-current=page' : '' }}>Portfolio</a>
            <a href="{{ route('templates') }}" class="nav-link block rounded-lg px-3 py-3 text-base min-h-[44px] flex items-center transition" {{ request()->routeIs('templates') ? 'aria-current=page' : '' }}>Templates</a>
            <a href="{{ route('contact') }}" class="nav-link block rounded-lg px-3 py-3 text-base min-h-[44px] flex items-center transition" {{ request()->routeIs('contact') ? 'aria-current=page' : '' }}>Contact</a>
        </div>
    </div>
</nav>

<div class="h-20 md:h-24 lg:h-32"></div>
