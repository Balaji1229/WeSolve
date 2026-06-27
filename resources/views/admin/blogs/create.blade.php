@extends('layouts.admin')

@section('title', 'Add Blog')
@section('page_title', 'Add New Blog')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="glass-card p-8">
        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-secondary mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required class="w-full rounded-xl input-bg px-4 py-3 text-sm text-primary focus:outline-none focus:border-[#305CDE]/50 transition">
                @error('title')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="slug" class="block text-sm font-medium text-secondary mb-2">Slug (optional)</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="w-full rounded-xl input-bg px-4 py-3 text-sm text-primary focus:outline-none focus:border-[#305CDE]/50 transition">
            </div>

            <div>
                <label for="short_description" class="block text-sm font-medium text-secondary mb-2">Short Description</label>
                <textarea name="short_description" id="short_description" rows="3" required class="w-full rounded-xl input-bg px-4 py-3 text-sm text-primary focus:outline-none focus:border-[#305CDE]/50 transition">{{ old('short_description') }}</textarea>
                @error('short_description')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-secondary mb-2">Content</label>
                <textarea name="content" id="content" rows="10" required class="w-full rounded-xl input-bg px-4 py-3 text-sm text-primary focus:outline-none focus:border-[#305CDE]/50 transition">{{ old('content') }}</textarea>
                @error('content')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="featured_image" class="block text-sm font-medium text-secondary mb-2">Featured Image</label>
                <input type="file" name="featured_image" id="featured_image" accept="image/*" class="block w-full text-sm text-muted file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-body-alt file:text-primary hover:file:bg-card-hover">
                @error('featured_image')<p class="mt-1 text-sm text-red-500">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="meta_title" class="block text-sm font-medium text-secondary mb-2">Meta Title <span class="text-xs text-muted">(50–60 chars)</span></label>
                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" class="w-full rounded-xl input-bg px-4 py-3 text-sm text-primary focus:outline-none focus:border-[#305CDE]/50 transition">
                    <span class="mt-1 block text-xs text-muted" data-counter-for="meta_title" data-min="50" data-max="60"></span>
                </div>
                <div>
                    <label for="meta_keywords" class="block text-sm font-medium text-secondary mb-2">Meta Keywords</label>
                    <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords') }}" class="w-full rounded-xl input-bg px-4 py-3 text-sm text-primary focus:outline-none focus:border-[#305CDE]/50 transition">
                </div>
            </div>

            <div>
                <label for="meta_description" class="block text-sm font-medium text-secondary mb-2">Meta Description <span class="text-xs text-muted">(150–160 chars)</span></label>
                <textarea name="meta_description" id="meta_description" rows="2" class="w-full rounded-xl input-bg px-4 py-3 text-sm text-primary focus:outline-none focus:border-[#305CDE]/50 transition">{{ old('meta_description') }}</textarea>
                <span class="mt-1 block text-xs text-muted" data-counter-for="meta_description" data-min="150" data-max="160"></span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="primary_keyword" class="block text-sm font-medium text-secondary mb-2">Primary Keyword</label>
                    <input type="text" name="primary_keyword" id="primary_keyword" value="{{ old('primary_keyword') }}" placeholder="e.g. chennai web development" class="w-full rounded-xl input-bg px-4 py-3 text-sm text-primary focus:outline-none focus:border-[#305CDE]/50 transition">
                </div>
                <div>
                    <label for="secondary_keywords" class="block text-sm font-medium text-secondary mb-2">Secondary Keywords <span class="text-xs text-muted">(comma separated)</span></label>
                    <input type="text" name="secondary_keywords" id="secondary_keywords" value="{{ old('secondary_keywords') }}" class="w-full rounded-xl input-bg px-4 py-3 text-sm text-primary focus:outline-none focus:border-[#305CDE]/50 transition">
                </div>
            </div>

            <div>
                <label for="canonical_url" class="block text-sm font-medium text-secondary mb-2">Canonical URL <span class="text-xs text-muted">(optional — leave blank to use this page's URL)</span></label>
                <input type="url" name="canonical_url" id="canonical_url" value="{{ old('canonical_url') }}" placeholder="https://..." class="w-full rounded-xl input-bg px-4 py-3 text-sm text-primary focus:outline-none focus:border-[#305CDE]/50 transition">
            </div>

            @include('admin.partials.faq-editor', ['faqs' => null])

            <div class="flex items-center gap-4">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }} class="rounded input-bg border-theme text-[#305CDE] focus:ring-[#305CDE]/50">
                    <span class="text-sm text-secondary">Published</span>
                </label>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="btn-gradient">Create Blog</button>
                <a href="{{ route('admin.blogs.index') }}" class="btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>
@include('admin.partials.meta-counters')
@endsection
