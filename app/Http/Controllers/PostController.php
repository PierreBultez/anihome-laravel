<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Post;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('Posts/Index', [
            'posts' => Post::latest('published_at')->get(),
            'faqs' => Faq::where('is_active', true)->orderBy('order')->get(),
        ]);
    }

    public function show(Post $post)
    {
        return Inertia::render('Posts/Show', [
            'post' => $post->load('user'),
        ]);
    }
}
