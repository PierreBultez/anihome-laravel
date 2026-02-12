<?php

use App\Models\User;
use App\Models\Service;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

beforeEach(function () {
    $this->withoutMiddleware([ValidateCsrfToken::class]);
});

test('admin can list services', function () {
    $user = User::factory()->create();
    Service::factory()->count(3)->create();

    $response = $this->actingAs($user)->get(route('admin.services.index'));

    $response->assertOk();
    $response->assertInertia(fn ($page) => $page
        ->component('Admin/Services/Index')
        ->has('services', 3)
    );
});

test('admin can create service with image', function () {
    $user = User::factory()->create();
    Storage::fake('public');
    $file = UploadedFile::fake()->image('service.jpg');

    $response = $this->actingAs($user)->post(route('admin.services.store'), [
        'title' => 'New Service',
        'description' => 'Desc',
        'content' => 'Content',
        'is_active' => true,
        'image' => $file,
    ]);

    $response->assertRedirect(route('admin.services.index'));
    
    $this->assertDatabaseHas('services', [
        'title' => 'New Service',
        'slug' => 'new-service',
        'is_active' => true,
    ]);

    $service = Service::where('title', 'New Service')->first();
    expect($service->image_path)->not->toBeNull();
    Storage::disk('public')->assertExists($service->image_path);
});

test('admin can update service status (partial update)', function () {
    $user = User::factory()->create();
    $service = Service::factory()->create(['is_active' => true]);

    $response = $this->actingAs($user)
        ->from(route('admin.services.index'))
        ->patch(route('admin.services.update', $service), [
            'is_active' => false,
        ]);

    $response->assertRedirect(route('admin.services.index'));
    
    $this->assertDatabaseHas('services', [
        'id' => $service->id,
        'is_active' => false,
    ]);
});

test('admin can bulk delete services', function () {
    $user = User::factory()->create();
    $services = Service::factory()->count(3)->create();
    $ids = $services->pluck('id')->toArray();

    $response = $this->actingAs($user)->delete(route('admin.services.bulk-destroy'), [
        'ids' => $ids,
    ]);

    $response->assertRedirect(route('admin.services.index'));
    
    foreach ($ids as $id) {
        $this->assertDatabaseMissing('services', ['id' => $id]);
    }
});
