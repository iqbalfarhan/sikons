<?php

namespace Database\Factories;

use App\Models\Datel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Datel>
 */
class DatelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'witel' => fake()->randomElement(Datel::$witels),
            'name' => fake()->word(),
        ];
    }
}
