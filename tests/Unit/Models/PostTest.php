<?php

use App\Models\Post;
use App\Models\User;
use Carbon\CarbonInterface;

test('to array', function () {
    $post = Post::factory()->create();

    expect($post->toArray())
        ->toHaveKeys([
            'id',
            'title',
            'slug',
            'content',
            'user_id',
            'created_at',
            'updated_at',
        ]);
});

test('user relationship', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create(['user_id' => $user->id]);

    expect($post->user)->toBeInstanceOf(User::class)
        ->and($post->user->id)->toBe($user->id);
});

test('published_at cast', function () {
    $post = Post::factory()->create(['published_at' => '2023-01-01']);

    expect($post->published_at)->toBeInstanceOf(CarbonInterface::class);
});
