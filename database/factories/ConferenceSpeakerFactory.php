<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ConferenceSpeaker>
 */
class ConferenceSpeakerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'surname' => fake()->lastName(),
            'image' => 'speakers/generic-man.jpg',
            'email' => fake()->email(),
            'title' => fake()->title(),
            'social_media' => 'test'
        ];
    }
}
