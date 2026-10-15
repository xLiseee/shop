<?php

use App\Support\ShoppingCart;
use Livewire\Attributes\On;
use Livewire\Component;

new class extends Component
{
    public int $itemCount = 0;

    public function mount(): void
    {
        $this->refreshCart();
    }

    #[On('cart-updated')]
    public function refreshCart(): void
    {
        $this->itemCount = app(ShoppingCart::class)->count();
    }
};
?>

<a href="{{ route('cart.show') }}" aria-label="Shopping cart, {{ $itemCount }} items" class="inline-flex items-center gap-2 rounded-full border border-stone-200 px-4 py-2 text-sm font-semibold text-stone-700 transition hover:border-green-200 hover:bg-green-50 hover:text-green-800">
    <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" class="size-5">
        <path d="M3 4h2l2.1 10.1a2 2 0 0 0 2 1.6h8.7a2 2 0 0 0 1.9-1.4L21 8H6" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" />
        <circle cx="10" cy="20" r="1" fill="currentColor" />
        <circle cx="18" cy="20" r="1" fill="currentColor" />
    </svg>
    <span>Cart</span>
    <span class="inline-flex min-w-6 items-center justify-center rounded-full bg-green-700 px-1.5 py-0.5 text-xs font-bold text-white">{{ $itemCount }}</span>
</a>
