<?php

namespace App\Http\Controllers;

use App\Models\Service;
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
        ]);
    }
}
