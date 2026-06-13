@extends('layouts.admin')

@section('title', 'Edit Template')
@section('page_title', 'Edit Template')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="rounded-xl bg-white dark:bg-gray-800 shadow-sm p-8">
        <form action="{{ route('admin.templates.update', $template) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $template->title) }}" required class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
                @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                <select name="category" id="category" required class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
                    <option value="" disabled>Select a category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ old('category', $template->category) === $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
                @error('category')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Template Preview Image</label>
                @if($template->image)
                    <div class="mt-2 mb-3">
                        <img src="{{ $template->imageUrl() }}" alt="{{ $template->title }}" class="h-40 rounded-lg object-cover border border-gray-200 dark:border-gray-600">
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Upload a new image to replace the current one.</p>
                    </div>
                @endif
                <input type="file" name="image" id="image" accept="image/webp,image/jpeg,image/png,image/jpg" class="mt-1 block w-full text-sm text-gray-600 dark:text-gray-400">
                @error('image')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sort Order</label>
                <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $template->sort_order) }}" min="0" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#305CDE]">
                @error('sort_order')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div class="flex items-center gap-4">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $template->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-[#305CDE] focus:ring-[#305CDE]">
                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Active</span>
                </label>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="rounded-lg bg-[#305CDE] px-6 py-2 text-sm font-medium text-white hover:bg-[#254bb5] transition">Update Template</button>
                <a href="{{ route('admin.templates.index') }}" class="rounded-lg bg-gray-200 dark:bg-gray-700 px-6 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 transition">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
