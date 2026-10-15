@props(['product'])

<article class="overflow-hidden rounded-3xl border border-stone-200/80 bg-white shadow-sm">
    <div class="grid md:grid-cols-2">
        <div class="relative min-h-72 bg-stone-100">
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="absolute inset-0 h-full w-full object-cover">
            <div class="absolute left-0 top-0 p-5">
                <x-shop.product-categories :categories="$product->categories" />
            </div>
        </div>

        <div class="flex flex-col p-6 sm:p-9 lg:p-12">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <span class="text-xs font-semibold uppercase tracking-[0.18em] text-stone-500">Product details</span>
                <x-shop.stock-status :stock="$product->stock" />
            </div>

            <h1 class="mt-5 text-3xl font-extrabold tracking-tight text-stone-900 sm:text-4xl">{{ $product->name }}</h1>
            <x-shop.product-price :price="$product->price" class="mt-4" />

            <div class="my-7 border-t border-stone-100"></div>

            <h2 class="text-sm font-bold uppercase tracking-wide text-stone-800">About this product</h2>
            <p class="mt-3 flex-1 whitespace-pre-line text-base leading-7 text-stone-600">
                {{ $product->description ?: 'A quality everyday essential, selected for your home.' }}
            </p>

            <div class="mt-8 flex flex-wrap gap-3">
                <livewire:shop.add-to-cart :product="$product" size="lg" :key="'add-to-cart-'.$product->id" />
                <x-shop.button :href="route('shop')" variant="secondary" size="lg">
                    <svg aria-hidden="true" viewBox="0 0 20 20" fill="currentColor" class="mr-2 size-4">
                        <path fill-rule="evenodd" d="M17 10a.75.75 0 0 1-.75.75H5.56l3.22 3.22a.75.75 0 1 1-1.06 1.06l-4.5-4.5a.75.75 0 0 1 0-1.06l4.5-4.5a.75.75 0 1 1 1.06 1.06l-3.22 3.22h10.69A.75.75 0 0 1 17 10Z" clip-rule="evenodd" />
                    </svg>
                    Back to shop
                </x-shop.button>
            </div>
        </div>
    </div>
</article>
