<?php

namespace Database\Seeders;

use App\Models\ConferenceSpeaker;
use App\Models\EventSpeaker;
use Illuminate\Database\Seeder;

class SpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventSpeaker::factory(5)->create();
        ConferenceSpeaker::factory(5)->create();
    }
}
