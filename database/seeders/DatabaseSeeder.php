<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::factory(5)
        ->has(\App\Models\Post::factory()->count(5)
        ->has(\App\Models\Comment::factory()->count(2))
        )->create();
    }
}

