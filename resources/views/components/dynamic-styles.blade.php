@php
$primary = \App\Models\Setting::get('brand_primary_color', '#305CDE');
$secondary = \App\Models\Setting::get('brand_secondary_color', '#00B6DA');

// Validate hex format; fall back to defaults if invalid.
$primary = preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $primary) ? $primary : '#305CDE';
$secondary = preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $secondary) ? $secondary : '#00B6DA';

$primaryRgb = implode(', ', sscanf($primary, '#%02x%02x%02x'));
$secondaryRgb = implode(', ', sscanf($secondary, '#%02x%02x%02x'));
@endphp

<style>
    :root {
        --color-primary: {{ $primary }};
        --color-secondary: {{ $secondary }};
        --color-primary-rgb: {{ $primaryRgb }};
        --color-secondary-rgb: {{ $secondaryRgb }};
    }
</style>
