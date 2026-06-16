@extends('layouts.app')

@section('title', $blog->meta_title ?? $blog->title . ' - WeSolve Technologies Blog')
@section('meta_description', $blog->meta_description ?? $blog->excerpt)
@section('meta_keywords', $blog->meta_keywords ?? '')

@section('meta_extra')
<meta property="og:site_name" content="WeSolve Technologies">
<meta property="og:title" content="{{ $blog->title }}">
<meta property="og:description" content="{{ $blog->excerpt }}">
<meta property="og:type" content="article">
<meta property="og:url" content="{{ route('blog.show', $blog->slug) }}">
@if($blog->og_image || $blog->featured_image)
<meta property="og:image" content="{{ asset('storage/' . ($blog->og_image ?? $blog->featured_image)) }}">
@endif
<meta property="og:locale" content="en_US">
<meta property="article:published_time" content="{{ $blog->published_at }}">
<meta property="article:author" content="{{ $blog->user?->name ?? 'WeSolve Technologies' }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $blog->title }}">
<meta name="twitter:description" content="{{ $blog->excerpt }}">
@if($blog->og_image || $blog->featured_image)
<meta name="twitter:image" content="{{ asset('storage/' . ($blog->og_image ?? $blog->featured_image)) }}">
@endif
@overwrite

@section('schema_extra')
{!! \App\Helpers\SeoHelper::schemaBlogPost($blog) !!}
@overwrite

@section('content')
<section class="relative overflow-hidden bg-body pt-16 pb-20 lg:pt-24 lg:pb-28">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] -top-40 -right-40 animate-pulse-glow"></div>
    <div class="relative mx-auto max-w-3xl px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <span class="tag mb-4">Article</span>
        <h1 class="text-3xl lg:text-5xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
            {{ $blog->title }}
        </h1>
        @if($blog->user)
        <div class="mt-6 flex items-center justify-center gap-3">
            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-[#305CDE] to-[#00B6DA] flex items-center justify-center text-white font-semibold text-sm" aria-hidden="true">
                {{ strtoupper(substr($blog->user->name, 0, 2)) }}
            </div>
            <div class="text-left">
                <div class="text-primary text-sm font-medium">{{ $blog->user->name }}</div>
                <div class="text-muted text-xs">{{ $blog->published_at?->format('F d, Y') }}</div>
            </div>
        </div>
        @endif
    </div>
</section>

<div class="section-divider"></div>

<section class="py-24 lg:py-32 bg-body">
    <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
        <article data-aos="fade-up">
            @if($blog->featured_image)
            <div class="rounded-2xl overflow-hidden mb-10">
                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="w-full h-64 md:h-80 object-cover" loading="lazy" width="800" height="320" decoding="async">
            </div>
            @endif

            <div class="prose max-w-none">
                {!! $blog->content !!}
            </div>

            <div class="mt-12 pt-8 border-t border-theme">
                <div class="flex items-center justify-between">
                    <span class="text-sm text-muted">Share this article:</span>
                    <div class="flex gap-2">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $blog->slug)) }}" target="_blank" rel="noopener noreferrer" class="rounded-full bg-card border border-theme-light px-4 py-2 text-muted text-sm hover:bg-card-hover hover:text-primary transition">Facebook</a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $blog->slug)) }}&text={{ urlencode($blog->title) }}" target="_blank" rel="noopener noreferrer" class="rounded-full bg-card border border-theme-light px-4 py-2 text-muted text-sm hover:bg-card-hover hover:text-primary transition">Twitter</a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $blog->slug)) }}" target="_blank" rel="noopener noreferrer" class="rounded-full bg-card border border-theme-light px-4 py-2 text-muted text-sm hover:bg-card-hover hover:text-primary transition">LinkedIn</a>
                    </div>
                </div>
            </div>
        </article>

        @if($relatedBlogs->count() > 0)
        <div class="mt-20">
            <h2 class="text-2xl font-bold text-primary mb-8" style="font-family: 'Space Grotesk', sans-serif;">Related Articles</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedBlogs as $related)
                <article class="group glass-card-hover overflow-hidden">
                    @if($related->featured_image)
                    <div class="h-32 overflow-hidden">
                        <img src="{{ asset('storage/' . $related->featured_image) }}" alt="{{ $related->title }}" class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy" width="400" height="128" decoding="async">
                    </div>
                    @endif
                    <div class="p-4">
                        <h3 class="font-semibold text-primary text-sm group-hover:text-[#305CDE] transition" style="font-family: 'Space Grotesk', sans-serif;">{{ $related->title }}</h3>
                        <a href="{{ route('blog.show', $related->slug) }}" class="mt-2 inline-flex items-center text-xs text-muted hover:text-[#305CDE] transition">Read more →</a>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
