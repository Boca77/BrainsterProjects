<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            AdminSeeder::class,
            UserSeeder::class,
            ConnectionSeeder::class,
            BadgeSeeder::class,
            TargetsPreferenceSeeder::class,
            TopicPreferenceSeeder::class,
            UsersBadgesSeeder::class,
            UsersTopicsSeeder::class,
            UsersTargetsSeeder::class,
            BlogSeeder::class,
            EventSeeder::class,
            TicketSeeder::class,
            AnnualConferenceSeeder::class,
            SpeakerSeeder::class,
            SpeakersEventsSeeder::class,
            ConferenceSpeakerSeeder::class,
            RelatedBlogsSeeder::class,
            CommentsSeeder::class,
            GeneralInfoSeeder::class,
            GeneralMembersSeeder::class,
            AgendaSeeder::class,
            AgendaContentSeeder::class
        ]);
    }
}
