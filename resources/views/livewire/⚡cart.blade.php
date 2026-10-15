<?php

use App\Support\ShoppingCart;
use Livewire\Component;

new class extends Component
{
    public function removeProduct(int $productId): void
    {
        if (app(ShoppingCart::class)->remove($productId)) {
            $this->dispatch('cart-updated');
        }
    }

    public function render()
    {
        return $this->view([
            'items' => app(ShoppingCart::class)->items(),
        ]);
    }
};
?>

<section class="mx-auto max-w-5xl px-4 py-10 sm:px-6 lg:px-8">
    <div class="mb-8">
        <a href="{{ route('shop') }}" class="text-sm font-semibold text-green-800 hover:text-green-900">&larr; Continue shopping</a>
        <h1 class="mt-4 text-3xl font-extrabold tracking-tight text-stone-900 sm:text-4xl">Your shopping cart</h1>
    </div>

    @if ($items->isEmpty())
        <div class="rounded-3xl border border-stone-200 bg-white px-6 py-14 text-center shadow-sm">
            <p class="text-lg font-semibold text-stone-800">Your cart is empty</p>
            <p class="mt-2 text-sm text-stone-500">Browse the shop and add something you love.</p>
            <x-shop.button :href="route('shop')" variant="primary" class="mt-6">Browse products</x-shop.button>
        </div>
    @else
        <ul class="divide-y divide-stone-100 overflow-hidden rounded-3xl border border-stone-200 bg-white px-6 shadow-sm">
            @foreach ($items as $item)
                <li wire:key="cart-item-{{ $item['product']->id }}" class="flex items-center gap-4 py-5 sm:gap-6">
                    <a href="{{ route('products.show', $item['product']) }}" class="size-20 shrink-0 overflow-hidden rounded-2xl bg-stone-100 sm:size-24">
                        <img src="{{ $item['product']->image_url }}" alt="" class="h-full w-full object-cover">
                    </a>
                    <div class="min-w-0 flex-1">
                        <a href="{{ route('products.show', $item['product']) }}" class="font-bold text-stone-900 hover:text-green-800">{{ $item['product']->name }}</a>
                        <p class="mt-1 text-sm text-stone-500">Quantity: {{ $item['quantity'] }}</p>
                    </div>
                    <x-shop.product-price :price="$item['product']->price * $item['quantity']" size="card" />
                    <button
                        type="button"
                        wire:click="removeProduct({{ $item['product']->id }})"
                        wire:loading.attr="disabled"
                        wire:target="removeProduct({{ $item['product']->id }})"
                        aria-label="Remove {{ $item['product']->name }} from cart"
                        class="rounded-full p-2 text-stone-500 transition hover:bg-red-50 hover:text-red-700 focus:outline-none focus:ring-2 focus:ring-red-600 disabled:opacity-50"
                    >
                        <svg aria-hidden="true" viewBox="0 0 20 20" fill="none" class="size-5">
                            <path d="M7 4h6m-9 2h12m-10.5 0 .6 10h5.8l.6-10M8 8v5m4-5v5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </li>
            @endforeach
        </ul>
    @endif
</section>
