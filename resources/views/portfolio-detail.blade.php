@extends('layouts.app')

@section('title', $portfolio->meta_title ?? $portfolio->title . ' - Portfolio | WeSolve Technologies')
@section('meta_description', $portfolio->meta_description ?? Str::limit($portfolio->description, 160))
@section('meta_keywords', $portfolio->meta_keywords ?? '')

@section('schema_extra')
    {!! \App\Helpers\SeoHelper::schemaCreativeWork($portfolio) !!}
@endsection

@section('content')
<x-breadcrumbs :items="[
    'Home' => route('home'),
    'Portfolio' => route('portfolio'),
    $portfolio->title => route('portfolio.show', $portfolio->slug),
]" />
<section class="relative overflow-hidden bg-body pt-16 pb-20 lg:pt-24 lg:pb-28">
    <div class="bg-orb bg-orb-purple w-[500px] h-[500px] -top-40 -right-40 animate-pulse-glow"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" data-aos="fade-up">
        <div class="text-center">
            <span class="tag mb-4">{{ $portfolio->category }}</span>
            <h1 class="text-4xl lg:text-6xl font-bold text-primary mt-4" style="font-family: 'Space Grotesk', sans-serif;">
                {{ $portfolio->title }}
            </h1>
            <p class="mt-6 text-lg text-secondary max-w-2xl mx-auto">
                {{ $portfolio->description }}
            </p>
            @if($portfolio->project_url)
            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ $portfolio->project_url }}" target="_blank" rel="noopener noreferrer" class="btn-gradient">View Live Project</a>
                <a href="{{ route('portfolio') }}" class="btn-outline">All Projects</a>
            </div>
            @endif
        </div>
    </div>
</section>

<div class="section-divider"></div>

<section class="py-24 lg:py-32 bg-body relative">
    <div class="bg-orb bg-orb-blue w-[400px] h-[400px] bottom-0 -left-20 animate-pulse-glow" style="animation-delay: 2s;"></div>

    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                @if($portfolio->project_image)
                <div class="rounded-2xl overflow-hidden">
                    <img src="{{ asset('storage/' . $portfolio->project_image) }}" alt="{{ $portfolio->title }}" class="w-full h-80 object-cover" width="800" height="320" loading="eager" fetchpriority="high" decoding="async">
                </div>
                @else
                <div class="glass-card p-12 flex items-center justify-center min-h-[300px]">
                    <div class="text-center">
                        <div class="text-6xl mb-4">🚀</div>
                        <h3 class="text-2xl font-bold gradient-text" style="font-family: 'Space Grotesk', sans-serif;">{{ $portfolio->title }}</h3>
                    </div>
                </div>
                @endif
            </div>

            <div data-aos="fade-left">
                <h2 class="text-3xl font-bold text-primary mb-6" style="font-family: 'Space Grotesk', sans-serif;">Project Details</h2>
                <div class="space-y-4 text-secondary">
                    @if($portfolio->client_name)
                    <p><strong class="text-primary">Client:</strong> {{ $portfolio->client_name }}</p>
                    @endif
                    @if($portfolio->completion_date)
                    <p><strong class="text-primary">Completed:</strong> {{ $portfolio->completion_date->format('F Y') }}</p>
                    @endif
                    @if($portfolio->technology_used)
                    <p><strong class="text-primary">Technologies:</strong> {{ $portfolio->technology_used }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
