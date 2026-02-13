<?php

use App\Models\Service;

test('to array', function () {
    $service = Service::factory()->create();
    $service->refresh();

    expect($service->toArray())
        ->toHaveKeys([
            'id',
            'title',
            'slug',
            'description',
            'content',
            'is_active',
            'is_featured',
            'created_at',
            'updated_at',
        ]);
});

test('casts', function () {
    $service = Service::factory()->create([
        'is_active' => 1,
        'is_featured' => 0,
    ]);

    expect($service->is_active)->toBeTrue()
        ->and($service->is_featured)->toBeFalse();
});
