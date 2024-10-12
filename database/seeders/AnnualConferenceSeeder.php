<?php

namespace Database\Seeders;

use App\Models\AnnualConference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnnualConferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AnnualConference::factory(10)->create();
    }
}
