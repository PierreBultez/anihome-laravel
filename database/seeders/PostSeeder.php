<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure there is at least one user to assign posts to
        $user = User::first() ?? User::factory()->create();

        Post::factory(10)->create([
            'user_id' => $user->id,
        ]);
    }
}
