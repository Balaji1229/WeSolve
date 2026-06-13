@extends('layouts.admin')

@section('title', 'SEO')
@section('page_title', 'Page SEO Settings')

@section('content')
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Page</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Meta Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
            @forelse($pageSeos as $pageSeo)
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white capitalize">{{ $pageSeo->page }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 truncate max-w-xs">{{ $pageSeo->meta_title ?? '—' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-medium {{ $pageSeo->is_active ? 'bg-green-100 text-green-800 dark:bg-green-500/10 dark:text-green-400 border border-green-200 dark:border-green-500/20' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-500/10 dark:text-yellow-400 border border-yellow-200 dark:border-yellow-500/20' }}">
                        {{ $pageSeo->is_active ? 'Active' : 'Inactive' }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('admin.seo.edit', $pageSeo) }}" class="text-[#305CDE] dark:text-[#305CDE] hover:text-[#305CDE] dark:hover:text-[#305CDE]">Edit</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">No SEO entries found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
