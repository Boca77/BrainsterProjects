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
            'image' => 'dummy_images\gettyimages-639805094-612x612.jpg',
            'email' => fake()->email(),
            'title' => fake()->title(),
            'social_media' => 'test'
        ];
    }
}
