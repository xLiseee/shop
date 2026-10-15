<x-layouts.app :title="$product->name">
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
        <nav aria-label="Breadcrumb" class="mb-6 text-sm">
            <a href="{{ route('shop') }}" class="font-medium text-stone-500 transition hover:text-green-800">Shop</a>
            <span aria-hidden="true" class="mx-2 text-stone-400">/</span>
            <span aria-current="page" class="font-semibold text-stone-800">{{ $product->name }}</span>
        </nav>

        <x-shop.product-detail :product="$product" />
    </div>
</x-layouts.app>
