<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Service;
use Inertia\Inertia;

class ServiceController extends Controller
{
    public function index()
    {
        return Inertia::render('Services/Index', [
            'services' => Service::where('is_active', true)->get(),
            'faqs' => Faq::where('is_active', true)->orderBy('order')->get(),
        ]);
    }

    public function show(Service $service)
    {
        return Inertia::render('Services/Show', [
            'service' => $service,
            'faqs' => Faq::where('is_active', true)->orderBy('order')->get(),
        ]);
    }
}
