@extends('layouts.app')

@section('title', 'Blog - Freelancers4U')

@section('content')
<section class="relative overflow-hidden bg-body pt-16 pb-20 lg:pt-24 lg:pb-28">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] -top-40 -right-40 animate-pulse-glow"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <span class="tag mb-4">Insights</span>
        <h1 class="text-4xl lg:text-6xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
            Our <span class="gradient-text">Blog</span>
        </h1>
        <p class="mt-6 text-lg text-muted max-w-2xl mx-auto">
            Tips and trends in web development
        </p>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-24 lg:py-32 bg-body relative">
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto mb-12" data-aos="fade-up">
            <form action="{{ route('blog') }}" method="GET" class="flex gap-2">
                <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search articles..." class="flex-1 rounded-full bg-card border border-theme-light px-5 py-3 text-sm text-primary placeholder-white/30 focus:outline-none focus:border-indigo-500/50 transition">
                <button type="submit" class="btn-gradient text-sm py-3 px-6">Search</button>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($blogs as $index => $blog)
            <article class="group glass-card-hover overflow-hidden" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                @if($blog->featured_image)
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy" width="400" height="192" decoding="async">
                </div>
                @endif
                <div class="p-6">
                    <time class="text-xs text-muted-light">{{ $blog->published_at?->format('M d, Y') }}</time>
                    <h2 class="mt-2 text-lg font-semibold text-primary group-hover:text-indigo-400 transition" style="font-family: 'Space Grotesk', sans-serif;">{{ $blog->title }}</h2>
                    <p class="mt-2 text-sm text-muted">{{ $blog->excerpt }}</p>
                    <a href="{{ route('blog.show', $blog->slug) }}" class="mt-4 inline-flex items-center text-sm text-muted hover:text-indigo-400 transition gap-1">
                        Read more <span>→</span>
                    </a>
                </div>
            </article>
            @empty
            <div class="col-span-3 text-center py-20">
                <div class="text-5xl mb-4">📝</div>
                <p class="text-muted text-lg">No blog posts found.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $blogs->links() }}
        </div>
    </div>
</section>
@endsection
