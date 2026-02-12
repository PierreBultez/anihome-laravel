<?php

use App\Models\User;
use App\Models\Faq;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

beforeEach(function () {
    $this->withoutMiddleware([ValidateCsrfToken::class]);
});

test('admin can list faqs', function () {
    $user = User::factory()->create();
    Faq::factory()->count(3)->create();

    $response = $this->actingAs($user)->get(route('admin.faqs.index'));

    $response->assertOk();
    $response->assertInertia(fn ($page) => $page
        ->component('Admin/Faqs/Index')
        ->has('faqs', 3)
    );
});

test('admin can create faq', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('admin.faqs.store'), [
        'question' => 'Nouvelle Question ?',
        'answer' => 'Réponse.',
        'is_active' => true,
        'order' => 1,
    ]);

    $response->assertRedirect(route('admin.faqs.index'));
    
    $this->assertDatabaseHas('faqs', [
        'question' => 'Nouvelle Question ?',
        'answer' => 'Réponse.',
    ]);
});

test('admin can update faq status', function () {
    $user = User::factory()->create();
    $faq = Faq::factory()->create(['is_active' => true]);

    $response = $this->actingAs($user)
        ->from(route('admin.faqs.index'))
        ->patch(route('admin.faqs.update', $faq), [
            'is_active' => false,
        ]);

    $response->assertRedirect(route('admin.faqs.index'));
    
    $this->assertDatabaseHas('faqs', [
        'id' => $faq->id,
        'is_active' => false,
    ]);
});

test('admin can bulk delete faqs', function () {
    $user = User::factory()->create();
    $faqs = Faq::factory()->count(3)->create();
    $ids = $faqs->pluck('id')->toArray();

    $response = $this->actingAs($user)->delete(route('admin.faqs.bulk-destroy'), [
        'ids' => $ids,
    ]);

    $response->assertRedirect(route('admin.faqs.index'));
    
    foreach ($ids as $id) {
        $this->assertDatabaseMissing('faqs', ['id' => $id]);
    }
});
