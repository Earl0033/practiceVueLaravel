<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true), // e.g. "Cool Shirt"
            'price' => $this->faker->randomFloat(2, 5, 200), // between 5 and 200
            'quantity' => $this->faker->numberBetween(5, 100),
            'description' => $this->faker->sentence(10),
        ];
    }
}
