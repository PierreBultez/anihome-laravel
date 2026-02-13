<?php

use App\Models\Service;

test('service show page can be rendered', function () {
    $service = Service::factory()->create();

    $response = $this->get(route('services.show', $service));

    $response->assertOk();
    $response->assertInertia(fn ($page) => $page
        ->component('Services/Show')
        ->has('service', fn ($json) => $json
            ->where('id', $service->id)
            ->where('title', $service->title)
            ->etc()
        )
    );
});

test('service show page returns 404 for non-existent service', function () {
    $this->get('/nos-services/non-existent-service')->assertNotFound();
});
