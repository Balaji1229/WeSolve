@extends('layouts.admin')

@section('title', 'Add Portfolio')
@section('page_title', 'Add New Portfolio')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="rounded-xl bg-white dark:bg-gray-800 shadow-sm p-8">
        <form action="{{ route('admin.portfolios.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Slug (optional)</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Category</label>
                <select name="category" id="category" required class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">Select category</option>
                    <option value="Website" {{ old('category') == 'Website' ? 'selected' : '' }}>Website</option>
                    <option value="App" {{ old('category') == 'App' ? 'selected' : '' }}>App</option>
                    <option value="SEO" {{ old('category') == 'SEO' ? 'selected' : '' }}>SEO</option>
                </select>
                @error('category')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                <textarea name="description" id="description" rows="4" required class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('description') }}</textarea>
                @error('description')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="project_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Project Image</label>
                <input type="file" name="project_image" id="project_image" accept="image/*" class="mt-1 block w-full text-sm text-gray-600 dark:text-gray-400">
                @error('project_image')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="technology_used" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Technologies (comma separated)</label>
                <input type="text" name="technology_used" id="technology_used" value="{{ old('technology_used') }}" required placeholder="Laravel, React, Tailwind CSS" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                @error('technology_used')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="project_url" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Project URL</label>
                <input type="url" name="project_url" id="project_url" value="{{ old('project_url') }}" placeholder="https://example.com" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div>
                <label for="client_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Client Name</label>
                <input type="text" name="client_name" id="client_name" value="{{ old('client_name') }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="flex items-center gap-4">
                <label class="flex items-center">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active') ? 'checked' : 'checked' }} class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">Active</span>
                </label>
            </div>

            <div class="flex gap-4">
                <button type="submit" class="rounded-lg bg-indigo-600 px-6 py-2 text-sm font-medium text-white hover:bg-indigo-500 transition">Create Portfolio</button>
                <a href="{{ route('admin.portfolios.index') }}" class="rounded-lg bg-gray-200 dark:bg-gray-700 px-6 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 transition">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
