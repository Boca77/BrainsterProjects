<?php

namespace Database\Seeders;

use App\Models\TargetsPreference;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTargetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            DB::table('users_targets')->insert([
                'user_id' => $user->id,
                'target_id' => TargetsPreference::query()->inRandomOrder()->first()->id,
            ]);
        }
    }
}
