@php
$height = $height ?? 100;
$classes = $classes ?? '';
@endphp

<img src="{{ asset('images/logo/weslovetechnologies.png') }}" alt="WeSolve Technologies" class="logo-responsive {{ $classes }}" style="--logo-desktop-height: {{ $height }}px;">
