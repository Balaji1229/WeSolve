@extends('layouts.admin')

@section('title', 'Blogs')
@section('page_title', 'Blog Posts')

@section('content')
<div class="flex justify-between items-center mb-6">
    <form action="{{ route('admin.blogs.index') }}" method="GET" class="flex gap-2">
        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search blogs..." class="rounded-xl input-bg px-4 py-2 text-sm text-primary focus:outline-none focus:border-[#305CDE]/50 transition">
        <button type="submit" class="rounded-xl input-bg px-4 py-2 text-sm font-medium text-muted hover:text-primary transition">Search</button>
    </form>
    <a href="{{ route('admin.blogs.create') }}" class="btn-gradient text-sm py-2.5 px-6">Add Blog</a>
</div>

<div class="glass-card overflow-hidden">
    <table class="min-w-full divide-y divide-white/[0.06]">
        <thead class="bg-card">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-muted-light uppercase tracking-wider">Title</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-muted-light uppercase tracking-wider">Author</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-muted-light uppercase tracking-wider">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-muted-light uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-muted-light uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-white/[0.06]">
            @forelse($blogs as $blog)
            <tr class="table-row-hover transition">
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-primary">{{ $blog->title }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-muted">{{ $blog->user?->name ?? 'N/A' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-medium {{ $blog->is_published ? 'bg-green-500/10 text-green-500 border border-green-500/20' : 'bg-yellow-500/10 text-yellow-500 border border-yellow-500/20' }}">
                        {{ $blog->is_published ? 'Published' : 'Draft' }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-muted">{{ $blog->created_at->format('M d, Y') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-[#305CDE] hover:text-[#254bb5] mr-3">Edit</a>
                    <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-8 text-center text-muted-light">No blogs found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $blogs->links() }}
</div>
@endsection
