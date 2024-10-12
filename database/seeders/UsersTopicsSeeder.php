<?php

namespace Database\Seeders;

use App\Models\TopicPreference;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            DB::table('users_topics')->insert([
                'user_id' => $user->id,
                'topic_id' => TopicPreference::query()->inRandomOrder()->first()->id,
            ]);
        }
    }
}
