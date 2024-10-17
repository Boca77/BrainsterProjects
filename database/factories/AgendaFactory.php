<?php

namespace Database\Factories;

use App\Models\AnnualConference;
use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agenda>
 */
class AgendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isForEvent = $this->faker->boolean;
        return [
            'date' => $this->faker->date(),
            'is_conference' => !$isForEvent,
            'title' => $this->faker->sentence(3),
            'event_id' => $isForEvent ? Event::query()->inRandomOrder()->first()->id : null,
            'annual_conference_id' => $isForEvent ? null : AnnualConference::query()->inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
