<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Fruit', 'description' => 'Fresh fruit and orchard favorites for healthy eating.'],
            ['name' => 'Vegetables', 'description' => 'Seasonal vegetables, greens, and root crops.'],
            ['name' => 'Bakery', 'description' => 'Breads, pastries, and baked goods prepared daily.'],
            ['name' => 'Dairy', 'description' => 'Milk, cheese, yogurt, and cultured dairy essentials.'],
            ['name' => 'Meat & Seafood', 'description' => 'Protein-rich meats, seafood, and fresh cuts.'],
            ['name' => 'Pantry Staples', 'description' => 'Rice, grains, beans, oils, and shelf-stable basics.'],
            ['name' => 'Snacks', 'description' => 'Crunchy snacks, sweets, and bite-sized treats.'],
            ['name' => 'Beverages', 'description' => 'Juices, sodas, water, and refreshing drinks.'],
            ['name' => 'Breakfast', 'description' => 'Morning essentials like cereal, oats, and spreads.'],
            ['name' => 'Frozen Foods', 'description' => 'Convenient frozen meals, vegetables, and desserts.'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                ['description' => $category['description']]
            );
        }
    }
}
