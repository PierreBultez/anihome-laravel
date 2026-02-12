<?php

use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServiceController;
use App\Models\Faq;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', HomeController::class)->name('home');

Route::get('/qui-sommes-nous', function () {
    return Inertia::render('About', [
        'latestPosts' => Post::latest('published_at')->limit(3)->get(),
        'faqs' => Faq::where('is_active', true)->orderBy('order')->get(),
    ]);
})->name('about');

Route::get('/nos-services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/nos-services/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/tarifs', function () {
    return Inertia::render('Pricing', [
        'faqs' => Faq::where('is_active', true)->orderBy('order')->get(),
    ]);
})->name('pricing');

Route::get('/album', GalleryController::class)->name('gallery');

Route::get('/actualite', [PostController::class, 'index'])->name('posts.index');
Route::get('/actualite/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/politique-de-confidentialite', function () {
    return Inertia::render('PrivacyPolicy');
})->name('privacy');

Route::get('/mentions-legales', function () {
    return Inertia::render('LegalMentions');
})->name('legal');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::post('media/upload', [MediaController::class, 'upload'])->name('media.upload');
    Route::delete('services/bulk', [\App\Http\Controllers\Admin\ServiceController::class, 'bulkDestroy'])->name('services.bulk-destroy');
    Route::resource('services', \App\Http\Controllers\Admin\ServiceController::class);

    Route::delete('posts/bulk', [\App\Http\Controllers\Admin\PostController::class, 'bulkDestroy'])->name('posts.bulk-destroy');
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);

    Route::delete('photos/bulk', [PhotoController::class, 'bulkDestroy'])->name('photos.bulk-destroy');
    Route::resource('photos', PhotoController::class);

    Route::delete('testimonials/bulk', [TestimonialController::class, 'bulkDestroy'])->name('testimonials.bulk-destroy');
    Route::resource('testimonials', TestimonialController::class);

    Route::delete('faqs/bulk', [FaqController::class, 'bulkDestroy'])->name('faqs.bulk-destroy');
    Route::resource('faqs', FaqController::class);
});

require __DIR__.'/settings.php';
