<?php

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

new class extends Component
{
    use WithPagination;

    public $selectedCategory = null;

    public $selectedSort = 'featured';

    public $filterCategory = null;

    public $filterSort = 'featured';

    protected $queryString = [
        'selectedCategory' => ['except' => ''],
        'selectedSort' => ['except' => 'featured'],
    ];

    public function mount(): void
    {
        $this->filterCategory = $this->selectedCategory;
        $this->filterSort = $this->selectedSort;
    }

    public function applyFilters(): void
    {
        $this->selectedCategory = $this->filterCategory;
        $this->selectedSort = $this->filterSort;
        $this->resetPage();
    }

    public function resetFilters(): void
    {
        $this->selectedCategory = null;
        $this->selectedSort = 'featured';
        $this->filterCategory = null;
        $this->filterSort = 'featured';
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::query()->orderBy('name')->get();

        $products = Product::query()
            ->with('categories')
            ->when($this->selectedCategory, function ($query) {
                $query->whereHas('categories', function ($query) {
                    $query->where('categories.id', $this->selectedCategory);
                });
            })
            ->when($this->selectedSort === 'price_asc', fn ($query) => $query->orderBy('price', 'asc'))
            ->when($this->selectedSort === 'price_desc', fn ($query) => $query->orderBy('price', 'desc'))
            ->when($this->selectedSort === 'popular', fn ($query) => $query->orderByDesc('sales'))
            ->when($this->selectedSort === 'newest', fn ($query) => $query->orderByDesc('created_at'))
            ->when($this->selectedSort === 'featured', fn ($query) => $query->orderByDesc('sales')->orderBy('price', 'asc'))
            ->paginate(12);

        return $this->view([
            'categories' => $categories,
            'products' => $products,
        ]);
    }
};
?>

<div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 items-start">
        <aside class="lg:col-span-1 flex justify-center lg:justify-start">
    <x-shop.filter
        :categories="$categories"
        :selectedCategory="$selectedCategory"
        :selectedSort="$selectedSort"
        :filterCategory="$filterCategory"
        :filterSort="$filterSort"
        :totalProducts="$products->total()"
    />
    </aside>

    <main class="lg:col-span-3">
    <div class="mt-6 grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($products as $product)
            <livewire:shop.product-card :product="$product" :key="$product->id" />
        @empty
            <div class="col-span-full rounded-2xl border border-gray-200 bg-white py-12 text-center text-gray-600 shadow-sm">
                No products match your current filters.
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        <x-shop.pagination :paginator="$products" />
    </div>
    </main>
    </div>
</div>
