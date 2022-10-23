<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Creation>
 */
class CreationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Name' => Str::random(8),
            'Description' => fake()->text(),
            'Price' => fake()->numberBetween(100, 3000),
            'cover' => fake()->imageUrl(),
        ];
    }
}
