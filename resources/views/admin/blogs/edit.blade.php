@extends('layouts.admin')

@section('title', 'Edit Blog')
@section('page_title', 'Edit Blog')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="rounded-xl bg-white dark:bg-gray-800 shadow-sm p-8">
        <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" required class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
                @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $blog->slug) }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
            </div>

            <div>
                <label for="short_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Short Description</label>
                <textarea name="short_description" id="short_description" rows="3" required class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">{{ old('short_description', $blog->short_description) }}</textarea>
                @error('short_description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
                <textarea name="content" id="content" rows="10" required class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">{{ old('content', $blog->content) }}</textarea>
                @error('content')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="featured_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Featured Image</label>
                @if($blog->featured_image)
                <div class="mt-2 mb-2">
                    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="Featured" class="h-32 rounded-lg object-cover">
                </div>
                @endif
                <input type="file" name="featured_image" id="featured_image" accept="image/*" class="mt-1 block w-full text-sm text-gray-600 dark:text-gray-400">
                @error('featured_image')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="meta_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Title <span class="text-xs text-gray-400">(50–60 chars)</span></label>
                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $blog->meta_title) }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
                    <span class="mt-1 block text-xs text-gray-400" data-counter-for="meta_title" data-min="50" data-max="60"></span>
                </div>
                <div>
                    <label for="meta_keywords" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Keywords</label>
                    <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $blog->meta_keywords) }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
                </div>
            </div>

            <div>
                <label for="meta_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Description <span class="text-xs text-gray-400">(150–160 chars)</span></label>
                <textarea name="meta_description" id="meta_description" rows="2" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">{{ old('meta_description', $blog->meta_description) }}</textarea>
                <span class="mt-1 block text-xs text-gray-400" data-counter-for="meta_description" data-min="150" data-max="160"></span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="primary_keyword" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Primary Keyword</label>
                    <input type="text" name="primary_keyword" id="primary_keyword" value="{{ old('primary_keyword', $blog->primary_keyword) }}" placeholder="e.g. chennai web development" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
                </div>
                <div>
                    <label for="secondary_keywords" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Secondary Keywords <span class="text-xs text-gray-400">(comma separated)</span></label>
                    <input type="text" name="secondary_keywords" id="secondary_keywords" value="{{ old('secondary_keywords', $blog->secondary_keywords) }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
                </div>
            </div>

            <div>
                <label for="canonical_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Canonical URL <span class="text-xs text-gray-400">(optional)</span></label>
                <input type="url" name="canonical_url" id="canonical_url" value="{{ old('canonical_url', $blog->canonical_url) }}" placeholder="https://..." class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
            </div>

            @include('admin.partials.faq-editor', ['faqs' => $blog->faqs])

            <div class="flex items-center gap-4">
                <label class="flex items-center">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published', $blog->is_published) ? 'checked' : '' }} class="rounded border-gray-300 text-[#305CDE] focus:ring-[#305CDE]">
                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Published</span>
                </label>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="rounded-lg bg-[#305CDE] px-6 py-2 text-sm font-medium text-white hover:bg-[#305CDE] transition">Update Blog</button>
                <a href="{{ route('admin.blogs.index') }}" class="rounded-lg bg-gray-200 dark:bg-gray-700 px-6 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 transition">Cancel</a>
            </div>
        </form>
    </div>
</div>
@include('admin.partials.meta-counters')
@endsection
