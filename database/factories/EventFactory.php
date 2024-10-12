<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
            'theme' => fake()->word(),
            'description' => fake()->paragraph(3),
            'objective' => fake()->paragraph(1),
            'agenda' => fake()->paragraph(2),
            'date' => fake()->date(),
            'location' => fake()->address(),
            'price' => fake()->numberBetween(100, 500)
        ];
    }
}
