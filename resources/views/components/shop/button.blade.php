@props([
    'href' => null,
    'type' => 'button',
    'variant' => 'primary',
    'size' => 'md',
])

@php
    $base = 'inline-flex items-center justify-center rounded-full font-semibold transition focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 disabled:pointer-events-none disabled:opacity-50';

    $variantClasses = match ($variant) {
        'primary' => 'bg-secondary text-zinc-50',
        'secondary' => 'border border-green-700 bg-white text-green-800 hover:bg-green-50',
        'light' => 'bg-white text-green-800 shadow-sm hover:bg-green-50',
        default => 'bg-green-700 text-white hover:bg-green-800',
    };

    $sizeClasses = match ($size) {
        'sm' => 'px-3 py-2 text-sm',
        'md' => 'px-4 py-2.5 text-sm',
        'lg' => 'px-6 py-3 text-base',
        default => '',
    };

    $classes = trim($base . ' ' . $variantClasses . ' ' . $sizeClasses);
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
