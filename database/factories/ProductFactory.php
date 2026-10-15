<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(2),
            'price' => $this->faker->randomFloat(2, 4, 95),
            'stock' => $this->faker->numberBetween(10, 250),
            'sales' => $this->faker->numberBetween(0, 200),
            'image_url' => 'https://picsum.photos/seed/' . $this->faker->uuid() . '/800/600',
        ];
    }
}
