<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConnectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            DB::table('connections')->insert([
                'user_id' => User::query()->inRandomOrder()->first()->id,
                'friend_id' => User::query()->inRandomOrder()->first()->id,
            ]);
        }
    }
}
