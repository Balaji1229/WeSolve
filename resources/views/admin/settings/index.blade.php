@extends('layouts.admin')

@section('title', 'Settings')
@section('page_title', 'Website Settings')

@section('content')
<div class="max-w-4xl mx-auto">
    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
        @csrf

        @foreach($settings as $group => $groupSettings)
        <div class="rounded-xl bg-white dark:bg-gray-800 shadow-sm p-8">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6 capitalize">{{ $group }} Settings</h3>
            <div class="space-y-6">
                @foreach($groupSettings as $setting)
                <div>
                    <label for="setting_{{ $setting->key }}" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ $setting->label }}</label>
                    @if($setting->type == 'textarea')
                    <textarea name="settings[{{ $setting->key }}]" id="setting_{{ $setting->key }}" rows="3" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('settings.' . $setting->key, $setting->value) }}</textarea>
                    @elseif($setting->type == 'boolean')
                    <select name="settings[{{ $setting->key }}]" id="setting_{{ $setting->key }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="1" {{ old('settings.' . $setting->key, $setting->value) == '1' ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('settings.' . $setting->key, $setting->value) == '0' ? 'selected' : '' }}>No</option>
                    </select>
                    @else
                    <input type="text" name="settings[{{ $setting->key }}]" id="setting_{{ $setting->key }}" value="{{ old('settings.' . $setting->key, $setting->value) }}" class="mt-1 block w-full rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 px-4 py-2 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

        @if($settings->isEmpty())
        <div class="rounded-xl bg-white dark:bg-gray-800 shadow-sm p-8 text-center">
            <p class="text-gray-500 dark:text-gray-400">No settings configured yet. Run the seeder to add default settings.</p>
        </div>
        @endif

        <div class="flex gap-4">
            <button type="submit" class="rounded-lg bg-indigo-600 px-6 py-2 text-sm font-medium text-white hover:bg-indigo-500 transition">Save Settings</button>
        </div>
    </form>
</div>
@endsection
