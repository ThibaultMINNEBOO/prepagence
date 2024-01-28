<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rooms = fake()->numberBetween(1, 10);
        return [
            'title' => fake()->sentence(6, true),
            'description' => fake()->sentences(4, true),
            'address' => fake()->address(),
            'surface' => fake()->numberBetween(20, 350),
            'rooms' => $rooms,
            'bedrooms' => fake()->numberBetween(1, $rooms),
            'floor' => fake()->numberBetween(0, 15),
            'price' => fake()->numberBetween(100000, 1000000),
            'city' => fake()->city(),
            'postal_code' => fake()->postcode(),
            'sold' => false,
        ];
    }

    public function sold(): static
    {
        return $this->state(fn (array $attributes) => [
            'sold' => true,
        ]);
    }
}
