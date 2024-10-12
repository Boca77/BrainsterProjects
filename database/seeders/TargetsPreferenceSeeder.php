<?php

namespace Database\Seeders;

use App\Models\TargetsPreference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TargetsPreferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TargetsPreference::factory(5)->create();
    }
}
