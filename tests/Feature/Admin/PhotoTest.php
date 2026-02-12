<?php

use App\Models\User;
use App\Models\Photo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

beforeEach(function () {
    $this->withoutMiddleware([ValidateCsrfToken::class]);
});

test('admin can list photos', function () {
    $user = User::factory()->create();
    Photo::factory()->count(3)->create();

    $response = $this->actingAs($user)->get(route('admin.photos.index'));

    $response->assertOk();
    $response->assertInertia(fn ($page) => $page
        ->component('Admin/Photos/Index')
        ->has('photos', 3)
    );
});

test('admin can upload photo', function () {
    $user = User::factory()->create();
    Storage::fake('public');
    $file = UploadedFile::fake()->image('album.jpg');

    $response = $this->actingAs($user)->post(route('admin.photos.store'), [
        'title' => 'New Photo',
        'image' => $file,
        'order' => 1,
    ]);

    $response->assertRedirect(route('admin.photos.index'));
    
    $this->assertDatabaseHas('photos', [
        'title' => 'New Photo',
        'order' => 1,
    ]);

    $photo = Photo::where('title', 'New Photo')->first();
    expect($photo->path)->toContain('/storage/photos/');
    Storage::disk('public')->assertExists(str_replace('/storage/', '', $photo->path));
});

test('admin can bulk delete photos', function () {
    $user = User::factory()->create();
    $photos = Photo::factory()->count(3)->create();
    $ids = $photos->pluck('id')->toArray();

    $response = $this->actingAs($user)->delete(route('admin.photos.bulk-destroy'), [
        'ids' => $ids,
    ]);

    $response->assertRedirect(route('admin.photos.index'));
    
    foreach ($ids as $id) {
        $this->assertDatabaseMissing('photos', ['id' => $id]);
    }
});
