@php
$height = $height ?? 80;
$classes = $classes ?? '';
@endphp

{{-- Light theme shows the dark-coloured logo; dark theme shows the light-coloured logo.
     Visibility is controlled via the .dark / .light class on <html>/<body> (see app.css). --}}
<img src="{{ asset('images/logo/wesolvetechnologies-dark.webp') }}" alt="WeSolve Technologies" class="logo-responsive logo-on-light {{ $classes }}" style="--logo-desktop-height: {{ $height }}px;" width="240" height="{{ $height }}">
<img src="{{ asset('images/logo/wesolvetechnologies-light.webp') }}" alt="WeSolve Technologies" class="logo-responsive logo-on-dark {{ $classes }}" style="--logo-desktop-height: {{ $height }}px;" width="240" height="{{ $height }}">
