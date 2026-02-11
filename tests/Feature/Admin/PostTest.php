<?php

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

beforeEach(function () {
    $this->withoutMiddleware([ValidateCsrfToken::class]);
});

test('admin can list posts', function () {
    $user = User::factory()->create();
    Post::factory()->count(3)->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->get(route('admin.posts.index'));

    $response->assertOk();
    $response->assertInertia(fn ($page) => $page
        ->component('Admin/Posts/Index')
        ->has('posts', 3)
    );
});

test('admin can create post with image', function () {
    $user = User::factory()->create();
    Storage::fake('public');

    $file = UploadedFile::fake()->image('cover.jpg');

    $response = $this->actingAs($user)->post(route('admin.posts.store'), [
        'title' => 'My New Post',
        'content' => 'Some content',
        'published_at' => now()->format('Y-m-d'),
        'image' => $file,
    ]);

    $response->assertRedirect(route('admin.posts.index'));
    
    $this->assertDatabaseHas('posts', [
        'title' => 'My New Post',
        'slug' => 'my-new-post',
    ]);

    $post = Post::where('title', 'My New Post')->first();
    expect($post->image_path)->not->toBeNull();
    Storage::disk('public')->assertExists($post->image_path);
});

test('admin can update post', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->put(route('admin.posts.update', $post), [
        'title' => 'Updated Title',
        'content' => 'Updated content',
        'published_at' => now()->format('Y-m-d'),
    ]);

    $response->assertRedirect(route('admin.posts.index'));
    
    $this->assertDatabaseHas('posts', [
        'id' => $post->id,
        'title' => 'Updated Title',
        'slug' => 'updated-title',
    ]);
});

test('admin can delete post', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->delete(route('admin.posts.destroy', $post));

    $response->assertRedirect(route('admin.posts.index'));
    
    $this->assertDatabaseMissing('posts', [
        'id' => $post->id,
    ]);
});
