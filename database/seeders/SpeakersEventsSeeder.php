<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Speaker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SpeakersEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = Event::all();

        foreach ($events as $event) {
            DB::table('speakers_event')->insert([
                'event_id' => $event->id,
                'speaker_id' => Speaker::query()->inRandomOrder()->first()->id,
            ]);
        }
    }
}
