<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactConfirmation;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function show()
    {
        return Inertia::render('Contact');
    }

    public function submit(ContactRequest $request)
    {
        $data = $request->validated();

        // Email pour l'admin
        Mail::to(config('mail.from.address'))->send(new ContactMessage($data));

        // Email de confirmation pour le visiteur
        Mail::to($data['email'])->send(new ContactConfirmation($data));

        return back()->with('success', 'Votre message a bien été envoyé. Un email de confirmation vous a été adressé.');
    }
}
