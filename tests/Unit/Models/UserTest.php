<?php

use App\Models\User;
use App\Models\Post;

test('to array', function () {
    $user = User::factory()->create();

    expect($user->toArray())
        ->toHaveKeys(['id', 'name', 'email', 'created_at', 'updated_at'])
        ->not->toHaveKeys(['password', 'remember_token']);
});

test('posts relationship', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create(['user_id' => $user->id]);

    expect($user->posts)->toHaveCount(1)
        ->and($user->posts->first()->id)->toBe($post->id);
});
