@props(['items' => []])

@php
    // $items is an associative array of [label => url]. The final entry is the
    // current page (rendered as plain text, not a link).
    $items = array_filter($items, fn ($url) => $url !== null && $url !== '');
    $entries = array_values($items);
    $labels = array_keys($items);
    $lastIndex = count($items) - 1;
@endphp

@if(count($items) > 1)
<nav aria-label="Breadcrumb" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pt-6">
    <ol class="flex flex-wrap items-center gap-2 text-sm text-muted">
        @foreach($labels as $i => $label)
            <li class="flex items-center gap-2">
                @if($i < $lastIndex)
                    <a href="{{ $entries[$i] }}" class="hover:text-[#305CDE] transition">{{ $label }}</a>
                    <span aria-hidden="true" class="text-muted/60">/</span>
                @else
                    <span aria-current="page" class="text-primary font-medium">{{ $label }}</span>
                @endif
            </li>
        @endforeach
    </ol>
</nav>

{!! \App\Helpers\SeoHelper::schemaBreadcrumb($items) !!}
@endif
