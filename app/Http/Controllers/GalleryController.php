<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Inertia\Inertia;

class GalleryController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Gallery', [
            'photos' => Photo::orderBy('order')->latest()->get(),
        ]);
    }
}
