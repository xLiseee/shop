@props(['price', 'size' => 'default'])

<p {{ $attributes->class(['m-0 font-bold tracking-tight text-green-800', $size === 'card' ? 'text-2xl' : 'text-3xl']) }}>
    €{{ number_format($price, 2, ',', '.') }}
</p>
