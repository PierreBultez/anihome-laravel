<?php

use App\Models\Post;
use App\Models\User;

test('post show page can be rendered', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create(['user_id' => $user->id]);

    $response = $this->get(route('posts.show', $post));

    $response->assertOk();
    $response->assertInertia(fn ($page) => $page
        ->component('Posts/Show')
        ->has('post', fn ($json) => $json
            ->where('id', $post->id)
            ->where('title', $post->title)
            ->etc()
        )
    );
});

test('post show page returns 404 for non-existent post', function () {
    $this->get('/actualite/non-existent-post')->assertNotFound();
});
