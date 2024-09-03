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

        $mgmg = User::factory()->create(
            ['name' => 'mgmg', 'username' => 'mgmg']
        );
        $aungaung = User::factory()->create(['name' => 'aungaung', 'username' => 'aungaung']);
        $frontend = Category::factory()->create(['name' => 'frontend', 'slug' => 'frontend']);
        $backend = Category::factory()->create(['name' => 'backend', 'slug' => 'backend']);

        // User::factory()->create();
        Blog::factory(2)->create(['category_id' => $frontend->id, 'user_id' => $mgmg->id]);
        Blog::factory(2)->create(['category_id' => $backend->id, 'user_id' => $aungaung->id]);
    }
}
