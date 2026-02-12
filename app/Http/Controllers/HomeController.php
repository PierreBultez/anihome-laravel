<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Service;
use App\Models\Testimonial;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Welcome', [
            'services' => Service::where('is_active', true)->get(),
            'featuredServices' => Service::where('is_active', true)
                ->where('is_featured', true)
                ->limit(3)
                ->get(),
            'testimonials' => Testimonial::where('is_active', true)->latest()->get(),
            'faqs' => Faq::where('is_active', true)->orderBy('order')->get(),
        ]);
    }
}
