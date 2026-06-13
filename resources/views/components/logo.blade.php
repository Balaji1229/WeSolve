@php
$height = $height ?? 100;
$classes = $classes ?? '';
@endphp

<img src="{{ asset('images/logo/weslovetechnologies.png') }}" alt="WeSolve Technologies" height="{{ $height }}" class="{{ $classes }}" style="height: {{ $height }}px; width: auto;">
