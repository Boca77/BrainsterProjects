<?php

namespace Database\Seeders;

use App\Models\GeneralMembers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralMembers::factory(5)->create();
    }
}
