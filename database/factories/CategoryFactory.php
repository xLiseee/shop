<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Fruit',
            'Vegetables',
            'Bakery',
            'Dairy',
            'Meat & Seafood',
            'Pantry Staples',
            'Snacks',
            'Beverages',
            'Breakfast',
            'Frozen Foods',
        ];

        return [
            'name' => $this->faker->unique()->randomElement($categories),
            'description' => $this->faker->sentence(8),
        ];
    }
}
