<header class="border-b border-stone-200/80 bg-white/90 backdrop-blur">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
        <a href="{{ route('shop') }}" class="group inline-flex items-center gap-3" aria-label="Farm and Fork home">
            <span class="flex size-10 items-center justify-center rounded-2xl bg-green-700 text-white shadow-sm transition group-hover:bg-green-800">
                <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" class="size-6">
                    <path d="M19.5 4.5C12 4.5 6 7.5 6 13.5c0 2.5 1.8 4.5 4.5 4.5 6 0 9-6 9-13.5Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M4.5 21c2.2-5.5 5.5-8.8 10-11" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
                </svg>
            </span>
            <span>
                <span class="block text-base font-extrabold leading-tight tracking-tight text-stone-900">Farm <span class="text-green-700">&amp; Fork</span></span>
                <span class="mt-0.5 hidden text-[10px] font-semibold uppercase tracking-[0.18em] text-stone-500 sm:block">Good food, every day</span>
            </span>
        </a>

        <nav aria-label="Main navigation" class="flex items-center gap-2">
            <a href="{{ route('shop') }}" aria-current="page" class="rounded-full bg-green-50 px-4 py-2 text-sm font-semibold text-green-800 transition hover:bg-green-100">
                Shop
            </a>
            <livewire:shared.cart-indicator />
        </nav>
    </div>
</header>