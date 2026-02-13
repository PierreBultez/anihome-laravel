<?php

use App\Models\Photo;

test('to array', function () {
    $photo = Photo::factory()->create();

    expect($photo->toArray())
        ->toHaveKeys([
            'id',
            'title',
            'path',
            'order',
            'created_at',
            'updated_at',
        ]);
});
