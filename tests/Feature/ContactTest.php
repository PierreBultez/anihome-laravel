<?php

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

beforeEach(function () {
    $this->withoutMiddleware([ValidateCsrfToken::class]);
});

test('contact form sends an email', function () {
    Mail::fake();

    $response = $this->post(route('contact.submit'), [
        'firstname' => 'John',
        'name' => 'Doe',
        'email' => 'john@example.com',
        'animal' => 'Chat(s)',
        'message' => 'Ceci est un message de test pour le formulaire de contact.',
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('success');

    Mail::assertSent(ContactMessage::class, function ($mail) {
        return $mail->hasTo(config('mail.from.address')) &&
               $mail->data['firstname'] === 'John' &&
               $mail->data['message'] === 'Ceci est un message de test pour le formulaire de contact.';
    });

    Mail::assertSent(\App\Mail\ContactConfirmation::class, function ($mail) {
        return $mail->hasTo('john@example.com') &&
               $mail->data['firstname'] === 'John';
    });
});

test('contact form validation works', function () {
    $response = $this->post(route('contact.submit'), [
        'firstname' => '',
        'name' => '',
        'email' => 'not-an-email',
        'message' => 'short',
    ]);

    $response->assertSessionHasErrors(['firstname', 'name', 'email', 'message']);
});
