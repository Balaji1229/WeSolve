@extends('layouts.admin')

@section('title', 'Edit Service')
@section('page_title', 'Edit Service')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="rounded-xl bg-white dark:bg-gray-800 shadow-sm p-8">
        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $service->title) }}" required class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
            </div>

            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug', $service->slug) }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Service Image</label>
                @if($service->image)
                <div class="mt-2 mb-2">
                    <img src="{{ asset('storage/' . $service->image) }}" alt="Service" class="h-32 rounded-lg object-cover">
                </div>
                @endif
                <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-600 dark:text-gray-400">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                <textarea name="description" id="description" rows="4" required class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">{{ old('description', $service->description) }}</textarea>
            </div>

            <div>
                <label for="pricing_text" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pricing Text</label>
                <input type="text" name="pricing_text" id="pricing_text" value="{{ old('pricing_text', $service->pricing_text) }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
            </div>

            <div>
                <label for="cta_button_text" class="block text-sm font-medium text-gray-700 dark:text-gray-300">CTA Button Text</label>
                <input type="text" name="cta_button_text" id="cta_button_text" value="{{ old('cta_button_text', $service->cta_button_text) }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
            </div>

            <div>
                <label for="cta_link" class="block text-sm font-medium text-gray-700 dark:text-gray-300">CTA Link</label>
                <input type="text" name="cta_link" id="cta_link" value="{{ old('cta_link', $service->cta_link) }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
            </div>

            <div>
                <label for="meta_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Title</label>
                <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $service->meta_title) }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
            </div>

            <div>
                <label for="meta_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Description</label>
                <textarea name="meta_description" id="meta_description" rows="3" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">{{ old('meta_description', $service->meta_description) }}</textarea>
            </div>

            <div>
                <label for="meta_keywords" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Meta Keywords</label>
                <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $service->meta_keywords) }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
            </div>

            <div class="flex items-center gap-4">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-[#305CDE] focus:ring-[#305CDE]">
                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Active</span>
                </label>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="rounded-lg bg-[#305CDE] px-6 py-2 text-sm font-medium text-white hover:bg-[#305CDE] transition">Update Service</button>
                <a href="{{ route('admin.services.index') }}" class="rounded-lg bg-gray-200 dark:bg-gray-700 px-6 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 transition">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
