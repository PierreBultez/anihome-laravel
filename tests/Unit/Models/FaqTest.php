<?php

use App\Models\Faq;

test('to array', function () {
    $faq = Faq::factory()->create();

    expect($faq->toArray())
        ->toHaveKeys([
            'id',
            'question',
            'answer',
            'is_active',
            'order',
            'created_at',
            'updated_at',
        ]);
});

test('casts', function () {
    $faq = Faq::factory()->create([
        'is_active' => 1,
        'order' => '5',
    ]);

    expect($faq->is_active)->toBeTrue()
        ->and($faq->order)->toBe(5);
});
