@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 mb-8">
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-muted">Services</p>
                <p class="text-2xl font-bold text-primary mt-1" style="font-family: 'Space Grotesk', sans-serif;">{{ $stats['services'] }}</p>
            </div>
            <div class="h-10 w-10 rounded-xl bg-indigo-500/10 flex items-center justify-center">
                <svg class="h-5 w-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
    </div>
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-muted">Portfolios</p>
                <p class="text-2xl font-bold text-primary mt-1" style="font-family: 'Space Grotesk', sans-serif;">{{ $stats['portfolios'] }}</p>
            </div>
            <div class="h-10 w-10 rounded-xl bg-purple-500/10 flex items-center justify-center">
                <svg class="h-5 w-5 text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
    </div>
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-muted">Blogs</p>
                <p class="text-2xl font-bold text-primary mt-1" style="font-family: 'Space Grotesk', sans-serif;">{{ $stats['blogs'] }}</p>
            </div>
            <div class="h-10 w-10 rounded-xl bg-blue-500/10 flex items-center justify-center">
                <svg class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                </svg>
            </div>
        </div>
    </div>
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-muted">Testimonials</p>
                <p class="text-2xl font-bold text-primary mt-1" style="font-family: 'Space Grotesk', sans-serif;">{{ $stats['testimonials'] }}</p>
            </div>
            <div class="h-10 w-10 rounded-xl bg-yellow-500/10 flex items-center justify-center">
                <svg class="h-5 w-5 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                </svg>
            </div>
        </div>
    </div>
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-muted">Messages</p>
                <p class="text-2xl font-bold text-primary mt-1" style="font-family: 'Space Grotesk', sans-serif;">{{ $stats['messages'] }}</p>
            </div>
            <div class="h-10 w-10 rounded-xl bg-green-500/10 flex items-center justify-center">
                <svg class="h-5 w-5 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
    </div>
    <div class="glass-card p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-muted">Unread</p>
                <p class="text-2xl font-bold text-primary mt-1" style="font-family: 'Space Grotesk', sans-serif;">{{ $stats['unread_messages'] }}</p>
            </div>
            <div class="h-10 w-10 rounded-xl bg-red-500/10 flex items-center justify-center">
                <svg class="h-5 w-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <div class="glass-card overflow-hidden">
        <div class="px-6 py-4 border-b border-theme">
            <h3 class="text-lg font-semibold text-primary" style="font-family: 'Space Grotesk', sans-serif;">Recent Messages</h3>
        </div>
        <div class="divide-y divide-white/[0.06]">
            @forelse($recentMessages as $message)
            <div class="px-6 py-4 flex items-center justify-between">
                <div>
                    <p class="font-medium text-primary text-sm">{{ $message->name }}</p>
                    <p class="text-sm text-muted">{{ Str::limit($message->message, 50) }}</p>
                </div>
                <span class="text-xs text-muted">{{ $message->created_at->diffForHumans() }}</span>
            </div>
            @empty
            <div class="px-6 py-8 text-center text-muted">No messages yet</div>
            @endforelse
        </div>
    </div>

    <div class="glass-card overflow-hidden">
        <div class="px-6 py-4 border-b border-theme">
            <h3 class="text-lg font-semibold text-primary" style="font-family: 'Space Grotesk', sans-serif;">Recent Blogs</h3>
        </div>
        <div class="divide-y divide-white/[0.06]">
            @forelse($recentBlogs as $blog)
            <div class="px-6 py-4 flex items-center justify-between">
                <div>
                    <p class="font-medium text-primary text-sm">{{ $blog->title }}</p>
                    <p class="text-xs text-muted">{{ $blog->is_published ? 'Published' : 'Draft' }}</p>
                </div>
                <span class="text-xs text-muted">{{ $blog->created_at->diffForHumans() }}</span>
            </div>
            @empty
            <div class="px-6 py-8 text-center text-muted">No blogs yet</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
