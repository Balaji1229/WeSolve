<footer class="border-t border-theme bg-body transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-12 md:grid-cols-4">
            <div class="space-y-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2 text-xl font-bold" style="font-family: 'Space Grotesk', sans-serif;" aria-label="WeSolve Technologies Home">
                    @include('components.logo', ['height' => 80])
                </a>
                <p class="text-sm text-muted leading-relaxed">
                    Affordable digital solutions for small businesses. We build websites, apps, and grow your online presence.
                </p>
            </div>

            <nav aria-label="Quick links">
                <h3 class="text-sm font-semibold text-primary uppercase tracking-wider mb-4">Quick Links</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('home') }}" class="text-sm text-muted hover:text-primary transition">Home</a></li>
                    <li><a href="{{ route('about') }}" class="text-sm text-muted hover:text-primary transition">About Us</a></li>
                    <li><a href="{{ route('developers') }}" class="text-sm text-muted hover:text-primary transition">Developers</a></li>
                    <li><a href="{{ route('services') }}" class="text-sm text-muted hover:text-primary transition">Services</a></li>
                    <li><a href="{{ route('portfolio') }}" class="text-sm text-muted hover:text-primary transition">Portfolio</a></li>
                    <li><a href="{{ route('templates') }}" class="text-sm text-muted hover:text-primary transition">Templates</a></li>
                </ul>
            </nav>

            <nav aria-label="Resources">
                <h3 class="text-sm font-semibold text-primary uppercase tracking-wider mb-4">Resources</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('blog') }}" class="text-sm text-muted hover:text-primary transition">Blog</a></li>
                    <li><a href="{{ route('contact') }}" class="text-sm text-muted hover:text-primary transition">Contact</a></li>
                    <li><a href="{{ route('sitemap') }}" class="text-sm text-muted hover:text-primary transition">Sitemap</a></li>
                    <li><a href="{{ route('terms') }}" class="text-sm text-muted hover:text-primary transition">Terms &amp; Conditions</a></li>
                </ul>
            </nav>

            <div>
                <h3 class="text-sm font-semibold text-primary uppercase tracking-wider mb-4">Contact</h3>
                <ul class="space-y-3">
                    <li class="text-sm text-muted">{{ \App\Models\Setting::get('contact_email', 'info@wesolvetechnologies.com') }}</li>
                    <li class="text-sm text-muted">{{ \App\Models\Setting::get('contact_phone', '+1 234 567 890') }}</li>
                </ul>
                <x-social-links containerClass="mt-6 flex flex-wrap gap-4" />
            </div>
        </div>

        <div class="section-divider mt-12 mb-8"></div>

        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-sm text-muted-light">
                &copy; {{ date('Y') }} WeSolve Technologies. All rights reserved.
            </p>
            <p class="text-sm text-muted-light">
                Crafted with care for small businesses worldwide.
            </p>
        </div>
    </div>
</footer>
