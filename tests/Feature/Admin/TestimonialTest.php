<?php

use App\Models\User;
use App\Models\Testimonial;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

beforeEach(function () {
    $this->withoutMiddleware([ValidateCsrfToken::class]);
});

test('admin can list testimonials', function () {
    $user = User::factory()->create();
    Testimonial::factory()->count(3)->create();

    $response = $this->actingAs($user)->get(route('admin.testimonials.index'));

    $response->assertOk();
    $response->assertInertia(fn ($page) => $page
        ->component('Admin/Testimonials/Index')
        ->has('testimonials', 3)
    );
});

test('admin can create testimonial with photo', function () {
    $user = User::factory()->create();
    Storage::fake('public');
    $file = UploadedFile::fake()->image('client.jpg');

    $response = $this->actingAs($user)->post(route('admin.testimonials.store'), [
        'name' => 'Jean Dupont',
        'content' => 'Super service !',
        'is_active' => true,
        'photo' => $file,
    ]);

    $response->assertRedirect(route('admin.testimonials.index'));
    
    $this->assertDatabaseHas('testimonials', [
        'name' => 'Jean Dupont',
        'content' => 'Super service !',
        'is_active' => true,
    ]);

    $testimonial = Testimonial::where('name', 'Jean Dupont')->first();
    expect($testimonial->photo_path)->not->toBeNull();
    Storage::disk('public')->assertExists($testimonial->photo_path);
});

test('admin can update testimonial status', function () {
    $user = User::factory()->create();
    $testimonial = Testimonial::factory()->create(['is_active' => true]);

    $response = $this->actingAs($user)
        ->from(route('admin.testimonials.index'))
        ->patch(route('admin.testimonials.update', $testimonial), [
            'is_active' => false,
        ]);

    $response->assertRedirect(route('admin.testimonials.index'));
    
    $this->assertDatabaseHas('testimonials', [
        'id' => $testimonial->id,
        'is_active' => false,
    ]);
});

test('admin can bulk delete testimonials', function () {
    $user = User::factory()->create();
    $testimonials = Testimonial::factory()->count(3)->create();
    $ids = $testimonials->pluck('id')->toArray();

    $response = $this->actingAs($user)->delete(route('admin.testimonials.bulk-destroy'), [
        'ids' => $ids,
    ]);

    $response->assertRedirect(route('admin.testimonials.index'));
    
    foreach ($ids as $id) {
        $this->assertDatabaseMissing('testimonials', ['id' => $id]);
    }
});
