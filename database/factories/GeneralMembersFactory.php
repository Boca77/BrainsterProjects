<?php

namespace Database\Factories;

use App\Models\GeneralInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GeneralMembers>
 */
class GeneralMembersFactory extends Factory
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
            'title' => fake()->word(),
            'bio' => fake()->paragraph(),
            'image' => 'test',
            'general_info_id' => GeneralInfo::query()->inRandomOrder()->first()->id
        ];
    }
}
