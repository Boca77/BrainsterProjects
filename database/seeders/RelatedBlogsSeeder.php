<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RelatedBlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = Blog::all();

        foreach ($blogs as $blog) {
            DB::table('related_blogs')->insert([
                'blog_id' => $blog->id,
                'related_blog_id' => Blog::query()->inRandomOrder()->first()->id,
            ]);
        }
    }
}
