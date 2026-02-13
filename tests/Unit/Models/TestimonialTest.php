<?php

use App\Models\Testimonial;

test('to array', function () {
    $testimonial = Testimonial::factory()->create();

    expect($testimonial->toArray())
        ->toHaveKeys([
            'id',
            'name',
            'content',
            'is_active',
            'created_at',
            'updated_at',
        ]);
});

test('casts', function () {
    $testimonial = Testimonial::factory()->create([
        'is_active' => 1,
    ]);

    expect($testimonial->is_active)->toBeTrue();
});
