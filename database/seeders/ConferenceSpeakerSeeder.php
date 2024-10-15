<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AnnualConference;
use App\Models\ConferenceSpeaker;
use Illuminate\Support\Facades\DB;


class ConferenceSpeakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conferences = AnnualConference::all();

        foreach ($conferences as $conference) {
            DB::table('speakers_conferences')->insert([
                'annual_conference_id' => $conference->id,
                'conference_speaker_id' => ConferenceSpeaker::query()->inRandomOrder()->first()->id,
            ]);
        }
    }
}
