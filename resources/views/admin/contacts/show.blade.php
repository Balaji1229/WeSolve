@extends('layouts.admin')

@section('title', 'Message Details')
@section('page_title', 'Message from ' . $contact->name)

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="rounded-xl bg-white dark:bg-gray-800 shadow-sm p-8">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-4">
                <div class="h-12 w-12 rounded-full bg-[#305CDE]/10 dark:bg-[#305CDE]/20 flex items-center justify-center text-[#305CDE] dark:text-[#305CDE] font-semibold">
                    {{ strtoupper(substr($contact->name, 0, 2)) }}
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $contact->name }}</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $contact->email }}</p>
                </div>
            </div>
            <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $contact->is_read ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' }}">
                {{ $contact->is_read ? 'Read' : 'Unread' }}
            </span>
        </div>

        <div class="space-y-4 mb-8">
            @if($contact->phone)
            <div>
                <span class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Phone</span>
                <p class="text-gray-900 dark:text-white">{{ $contact->phone }}</p>
            </div>
            @endif
            @if($contact->service)
            <div>
                <span class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Service</span>
                <p class="text-gray-900 dark:text-white">{{ $contact->service }}</p>
            </div>
            @endif
            <div>
                <span class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Message</span>
                <p class="text-gray-900 dark:text-white mt-1 whitespace-pre-line">{{ $contact->message }}</p>
            </div>
            <div>
                <span class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Received</span>
                <p class="text-gray-900 dark:text-white">{{ $contact->created_at->format('F d, Y H:i') }}</p>
            </div>
        </div>

        <div class="flex gap-4">
            @if(!$contact->is_read)
            <form action="{{ route('admin.contacts.read', $contact) }}" method="POST">
                @csrf
                <button type="submit" class="rounded-lg bg-[#305CDE] px-6 py-2 text-sm font-medium text-white hover:bg-[#305CDE] transition">Mark as Read</button>
            </form>
            @endif
            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded-lg bg-red-600 px-6 py-2 text-sm font-medium text-white hover:bg-red-500 transition">Delete</button>
            </form>
            <a href="{{ route('admin.contacts.index') }}" class="rounded-lg bg-gray-200 dark:bg-gray-700 px-6 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-300 dark:hover:bg-gray-600 transition">Back</a>
        </div>
    </div>
</div>
@endsection
