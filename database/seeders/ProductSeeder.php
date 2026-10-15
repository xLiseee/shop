<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryIds = Category::pluck('id')->all();

        if ($categoryIds === []) {
            $this->call(CategorySeeder::class);
            $categoryIds = Category::pluck('id')->all();
        }

        Product::factory(200)->create()->each(function (Product $product) use ($categoryIds) {
            $selectedCategories = collect($categoryIds)
                ->shuffle()
                ->take(rand(1, min(3, count($categoryIds))))
                ->all();

            $product->categories()->syncWithoutDetaching($selectedCategories);
        });
    }
}
