<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Photo;
use Inertia\Inertia;

class GalleryController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Gallery', [
            'photos' => Photo::orderBy('order')->latest()->get(),
            'faqs' => Faq::where('is_active', true)->orderBy('order')->get(),
        ]);
    }
}
