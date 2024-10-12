<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogBodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = Blog::all();

        foreach ($blogs as $blog) {
            DB::table('blog_body')->insert([
                'sub_title' => fake()->paragraph(1),
                'content' => fake()->paragraph(5),
                'blog_id' => $blog->id,
            ]);
        }
    }
}
