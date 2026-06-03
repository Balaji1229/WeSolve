@extends('layouts.admin')

@section('title', 'Add Blog')
@section('page_title', 'Add New Blog')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="glass-card p-8">
        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-white/70 mb-2">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required class="w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition">
                @error('title')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="slug" class="block text-sm font-medium text-white/70 mb-2">Slug (optional)</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition">
            </div>

            <div>
                <label for="short_description" class="block text-sm font-medium text-white/70 mb-2">Short Description</label>
                <textarea name="short_description" id="short_description" rows="3" required class="w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition">{{ old('short_description') }}</textarea>
                @error('short_description')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="content" class="block text-sm font-medium text-white/70 mb-2">Content</label>
                <textarea name="content" id="content" rows="10" required class="w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition">{{ old('content') }}</textarea>
                @error('content')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="featured_image" class="block text-sm font-medium text-white/70 mb-2">Featured Image</label>
                <input type="file" name="featured_image" id="featured_image" accept="image/*" class="block w-full text-sm text-white/50 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-medium file:bg-white/5 file:text-white hover:file:bg-white/10">
                @error('featured_image')<p class="mt-1 text-sm text-red-400">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="meta_title" class="block text-sm font-medium text-white/70 mb-2">Meta Title</label>
                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title') }}" class="w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition">
                </div>
                <div>
                    <label for="meta_keywords" class="block text-sm font-medium text-white/70 mb-2">Meta Keywords</label>
                    <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords') }}" class="w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition">
                </div>
            </div>

            <div>
                <label for="meta_description" class="block text-sm font-medium text-white/70 mb-2">Meta Description</label>
                <textarea name="meta_description" id="meta_description" rows="2" class="w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 text-white text-sm focus:outline-none focus:border-indigo-500/50 transition">{{ old('meta_description') }}</textarea>
            </div>

            <div class="flex items-center gap-4">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }} class="rounded bg-white/5 border-white/10 text-indigo-500 focus:ring-indigo-500/50">
                    <span class="text-sm text-white/70">Published</span>
                </label>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="btn-gradient">Create Blog</button>
                <a href="{{ route('admin.blogs.index') }}" class="btn-outline">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
