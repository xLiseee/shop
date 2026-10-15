<x-layouts.app :title="__('Shop')">
    <section class="mx-auto max-w-7xl px-4 pt-10 sm:px-6 lg:px-8">
        <div class="rounded-3xl bg-secondary p-6 text-white shadow-sm sm:p-10">
            <div class="text-sm font-semibold uppercase tracking-[0.2em]">Farm &amp; Fork</div>
            <h1 class="mt-3 mb-2 text-4xl font-black tracking-tight sm:text-5xl">Shop all essentials</h1>
            <p class="mb-0 text-green-100">Fresh groceries, pantry favorites, and everyday essentials for the modern home.</p>
        </div>
    </section>

    <livewire:shop-catalog />
</x-layouts.app>
