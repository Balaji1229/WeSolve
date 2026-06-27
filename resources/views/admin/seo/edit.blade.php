@extends('layouts.admin')

@section('title', 'Edit SEO')
@section('page_title', 'Edit SEO: ' . ucfirst($seo->page))

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="rounded-xl bg-white dark:bg-gray-800 shadow-sm p-8">
        <form action="{{ route('admin.seo.update', $seo) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="meta_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Title <span class="text-xs text-gray-400">(50–60 chars)</span></label>
                <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $seo->meta_title) }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
                <span class="mt-1 block text-xs text-gray-400" data-counter-for="meta_title" data-min="50" data-max="60"></span>
                @error('meta_title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="meta_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Description <span class="text-xs text-gray-400">(150–160 chars)</span></label>
                <textarea name="meta_description" id="meta_description" rows="4" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">{{ old('meta_description', $seo->meta_description) }}</textarea>
                <span class="mt-1 block text-xs text-gray-400" data-counter-for="meta_description" data-min="150" data-max="160"></span>
                @error('meta_description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="meta_keywords" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Keywords</label>
                <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $seo->meta_keywords) }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
                @error('meta_keywords')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="og_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">OG Image</label>
                @if($seo->og_image)
                <div class="mt-2 mb-2">
                    <img src="{{ asset('storage/' . $seo->og_image) }}" alt="OG Image" class="h-32 rounded-lg object-cover border border-gray-200 dark:border-gray-700">
                </div>
                @endif
                <input type="file" name="og_image" id="og_image" accept="image/*" class="mt-1 block w-full text-sm text-gray-600 dark:text-gray-400">
                @error('og_image')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            @include('admin.partials.faq-editor', ['faqs' => $seo->faqs])

            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $seo->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-[#305CDE] focus:ring-[#305CDE]">
                <label for="is_active" class="text-sm text-gray-700 dark:text-gray-300">Active</label>
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" class="rounded-lg bg-[#305CDE] px-6 py-2 text-sm font-medium text-white hover:bg-[#305CDE] transition">Update SEO</button>
                <a href="{{ route('admin.seo.index') }}" class="rounded-lg bg-gray-200 dark:bg-gray-700 px-6 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 transition">Cancel</a>
            </div>
        </form>
    </div>
</div>
@include('admin.partials.meta-counters')
@endsection
