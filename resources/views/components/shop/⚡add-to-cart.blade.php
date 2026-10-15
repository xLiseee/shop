<?php

use App\Models\Product;
use App\Support\ShoppingCart;
use Livewire\Component;

new class extends Component
{
    public Product $product;

    public string $size = 'md';

    public string $message = '';

    public function addToCart(): void
    {
        $product = Product::query()->findOrFail($this->product->getKey());

        if (! app(ShoppingCart::class)->add($product)) {
            $this->message = 'No more stock available.';

            return;
        }

        $this->message = 'Added to your cart.';
        $this->dispatch('cart-updated');
    }
};
?>

<div class="text-right" style="pointer-events: auto; position: relative; z-index: 20;">
    <x-shop.button
        type="button"
        variant="primary"
        :size="$size"
        class="pointer-events-auto relative z-20 gap-2 whitespace-nowrap shadow-sm color-primary hover:shadow-md"
        wire:click="addToCart"
        wire:loading.attr="disabled"
        wire:target="addToCart"
        :disabled="$product->stock < 1"
    >
        <span wire:loading.remove wire:target="addToCart">Add to cart</span>
        <span wire:loading wire:target="addToCart">Adding...</span>
        <svg aria-hidden="true" viewBox="0 0 20 20" fill="currentColor" class="size-4">
            <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
        </svg>
    </x-shop.button>

    @if ($message)
        <p role="status" class="mt-2 text-xs font-medium text-green-800">{{ $message }}</p>
    @endif
</div>
