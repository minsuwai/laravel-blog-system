<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Blog::truncate();
        Category::truncate();
        User::factory()->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $frontend = Category::create([
            'name' => 'Frontend',
            'slug' => 'frontend',
        ]);

        $backend = Category::create([
            'name' => 'Backend',
            'slug' => 'backend',
        ]);

        Blog::create([
            'title' => 'frontend post',
            'slug' => 'frontend-post',
            'intro' => 'this is introduction',
            'body' => 'lorem ipsum dolor sit amet consectetur adipiscing elit',
            'category_id' => $frontend->id
        ]);

        Blog::create([
            'title' => 'backend post',
            'slug' => 'backend-post',
            'intro' => 'this is introduction',
            'body' => 'lorem ipsum dolor sit amet consectetur adipiscing elit',
            'category_id' => $backend->id
        ]);
    }
}
