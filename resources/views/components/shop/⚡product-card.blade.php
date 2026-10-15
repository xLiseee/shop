<?php

use App\Models\Product;
use Livewire\Component;

new class extends Component
{
    public Product $product;
};
?>

<article class="group relative flex h-full flex-col overflow-hidden rounded-3xl border border-stone-100 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-green-950/10">
    <a href="{{ route('products.show', $product) }}" aria-label="View {{ $product->name }}" class="absolute inset-0 z-0 rounded-3xl focus:outline-none focus:ring-2 focus:ring-inset focus:ring-green-600"></a>
    <div class="pointer-events-none relative z-10 flex flex-1 flex-col">
        <div class="relative overflow-hidden bg-white">
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="aspect-[4/3] w-full mx-auto object-cover transition duration-500 group-hover:scale-105">
            <div class="absolute left-0 top-0 p-4">
                <x-shop.product-categories :categories="$product->categories->take(2)" />
            </div> 
        </div>

        <div class="flex flex-1 flex-col p-5 sm:p-6">
            <div class="mb-3 flex items-start justify-between gap-3">
                <h3 class="mb-0 text-lg font-bold leading-snug tracking-tight text-stone-900">{{ $product->name }}</h3>
                <x-shop.stock-status :stock="$product->stock" />
            </div>

            <p class="mb-5 line-clamp-3 flex-1 text-sm leading-relaxed text-stone-600">{{ $product->description }}</p>

            <div class="mt-auto flex items-end justify-between gap-3 border-t border-stone-100 pt-4">
                <div>
                    <div class="mb-1 text-[11px] font-semibold uppercase tracking-[0.16em] text-stone-500">Price</div>
                    <x-shop.product-price :price="$product->price" size="card" />
                </div>

                <livewire:shop.add-to-cart :product="$product" size="sm" :key="'add-to-cart-'.$product->id" />
            </div>
        </div>
    </div>
</article>
