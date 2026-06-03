<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ route('home') }}</loc>
        <lastmod>{{ now()->toDateString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc>{{ route('about') }}</loc>
        <lastmod>{{ now()->toDateString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('services') }}</loc>
        <lastmod>{{ now()->toDateString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('portfolio') }}</loc>
        <lastmod>{{ now()->toDateString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc>{{ route('blog') }}</loc>
        <lastmod>{{ now()->toDateString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc>{{ route('contact') }}</loc>
        <lastmod>{{ now()->toDateString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>

    @foreach($services as $service)
    <url>
        <loc>{{ route('service.show', $service->slug) }}</loc>
        <lastmod>{{ $service->updated_at->toDateString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach

    @foreach($portfolios as $portfolio)
    <url>
        <loc>{{ route('portfolio.show', $portfolio->slug) }}</loc>
        <lastmod>{{ $portfolio->updated_at->toDateString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.6</priority>
    </url>
    @endforeach

    @foreach($blogs as $blog)
    <url>
        <loc>{{ route('blog.show', $blog->slug) }}</loc>
        <lastmod>{{ $blog->updated_at->toDateString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    @endforeach
</urlset>
