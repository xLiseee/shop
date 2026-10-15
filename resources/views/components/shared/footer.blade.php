<footer class="border-t border-stone-200 bg-white">
    <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-8 sm:px-6 md:flex-row md:items-center md:justify-between lg:px-8">
        <a href="{{ route('shop') }}" class="inline-flex w-fit items-center gap-2 font-extrabold tracking-tight text-stone-900" aria-label="Farm and Fork home">
            <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" class="size-5 text-green-700">
                <path d="M19.5 4.5C12 4.5 6 7.5 6 13.5c0 2.5 1.8 4.5 4.5 4.5 6 0 9-6 9-13.5Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M4.5 21c2.2-5.5 5.5-8.8 10-11" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
            </svg>
            <span>Farm <span class="text-green-700">&amp; Fork</span></span>
        </a>

        <p class="m-0 text-sm text-stone-500">
            Fresh groceries and everyday essentials for your home.
        </p>

        <p class="m-0 text-sm text-stone-500">
            &copy; {{ now()->year }} Farm &amp; Fork
        </p>
    </div>
</footer>