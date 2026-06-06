<footer class="border-t border-theme bg-body transition-colors duration-300">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-12 md:grid-cols-4">
            <div class="space-y-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2 text-xl font-bold" style="font-family: 'Space Grotesk', sans-serif;" aria-label="Freelancers4U Home">
                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600" aria-hidden="true">
                        <svg class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                        </svg>
                    </div>
                    <span class="gradient-text">Freelancers4U</span>
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
                </ul>
            </nav>

            <nav aria-label="Resources">
                <h3 class="text-sm font-semibold text-primary uppercase tracking-wider mb-4">Resources</h3>
                <ul class="space-y-3">
                    <li><a href="{{ route('blog') }}" class="text-sm text-muted hover:text-primary transition">Blog</a></li>
                    <li><a href="{{ route('contact') }}" class="text-sm text-muted hover:text-primary transition">Contact</a></li>
                    <li><a href="{{ route('sitemap') }}" class="text-sm text-muted hover:text-primary transition">Sitemap</a></li>
                </ul>
            </nav>

            <div>
                <h3 class="text-sm font-semibold text-primary uppercase tracking-wider mb-4">Contact</h3>
                <ul class="space-y-3">
                    <li class="text-sm text-muted">{{ \App\Models\Setting::get('contact_email', 'info@freelancers4u.com') }}</li>
                    <li class="text-sm text-muted">{{ \App\Models\Setting::get('contact_phone', '+1 234 567 890') }}</li>
                </ul>
                <div class="mt-6 flex space-x-4">
                    <a href="{{ \App\Models\Setting::get('social_facebook', '#') }}" class="text-muted-light hover:text-indigo-400 transition" aria-label="Facebook" rel="noopener noreferrer">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="{{ \App\Models\Setting::get('social_twitter', '#') }}" class="text-muted-light hover:text-indigo-400 transition" aria-label="Twitter" rel="noopener noreferrer">
                        <span class="sr-only">Twitter</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                    <a href="{{ \App\Models\Setting::get('social_linkedin', '#') }}" class="text-muted-light hover:text-indigo-400 transition" aria-label="LinkedIn" rel="noopener noreferrer">
                        <span class="sr-only">LinkedIn</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="section-divider mt-12 mb-8"></div>

        <div class="flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-sm text-muted-light">
                &copy; {{ date('Y') }} Freelancers4U. All rights reserved.
            </p>
            <p class="text-sm text-muted-light">
                Crafted with care for small businesses worldwide.
            </p>
        </div>
    </div>
</footer>
