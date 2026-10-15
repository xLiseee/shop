@props([
    'categories',
    'selectedCategory' => null,
    'selectedSort' => 'featured',
    'filterCategory' => null,
    'filterSort' => 'featured',
    'totalProducts' => 0,
])

<form wire:submit.prevent="applyFilters" class="mb-6 rounded-2xl border border-gray-100 bg-white p-6 shadow-sm sm:p-8">
    <div>
<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-1 lg:space-y-4">
                <div class="sm:col-span-2 lg:col-span-1">
                <div class="mb-2 flex items-center gap-3">
                    <span class="rounded-full bg-green-100 px-3 py-2 text-sm font-semibold text-green-800">Shop</span>
                </div>
                <h2 class="mb-0 text-2xl font-bold">Fresh picks</h2>
            </div>

            <div class="lg:col-span-3">
                <label for="category" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-gray-600">Category</label>
                <select id="category" wire:model="filterCategory" class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-green-600 focus:outline-none focus:ring-2 focus:ring-green-600/20">
                    <option value="">All products</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected((string) $filterCategory === (string) $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="lg:col-span-3">
                <label for="sort" class="mb-1 block text-xs font-semibold uppercase tracking-wide text-gray-600">Sort by</label>
                <select id="sort" wire:model="filterSort" class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-900 shadow-sm focus:border-green-600 focus:outline-none focus:ring-2 focus:ring-green-600/20">
                    <option value="featured" @selected($filterSort === 'featured')>Featured</option>
                    <option value="price_asc" @selected($filterSort === 'price_asc')>Price: low to high</option>
                    <option value="price_desc" @selected($filterSort === 'price_desc')>Price: high to low</option>
                    <option value="popular" @selected($filterSort === 'popular')>Popular</option>
                    <option value="newest" @selected($filterSort === 'newest')>Newest</option>
                </select>
            </div>

            <div class="flex gap-2 lg:col-span-2">
                <x-shop.button type="submit" variant="primary" class="flex-grow">Apply</x-shop.button>
                @if ($selectedCategory || $selectedSort !== 'featured')
                    <x-shop.button type="button" wire:click="resetFilters" variant="secondary">Reset</x-shop.button>
                @endif
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between border-t border-gray-200 pt-4 text-sm text-gray-600">
            <span>{{ $totalProducts }} products</span>
            <span>{{ $selectedCategory ? 'Filtered view' : 'All items' }}</span>
        </div>
    </div>
</form>
