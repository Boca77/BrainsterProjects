<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialMedia::create([
            'platform' => 'twitter',
            'url' => 'twitter/link',
        ]);

        SocialMedia::create([
            'platform' => 'linkedIn',
            'url' => 'linkedIn/link',
        ]);

        SocialMedia::create([
            'platform' => 'facebook',
            'url' => 'facebook/link',
        ]);
    }
}
