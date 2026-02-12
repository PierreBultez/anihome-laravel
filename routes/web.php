<?php

use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', HomeController::class)->name('home');

Route::get('/qui-sommes-nous', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/nos-services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/nos-services/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

Route::get('/tarifs', function () {
    return Inertia::render('Pricing');
})->name('pricing');

Route::get('/album', GalleryController::class)->name('gallery');

Route::get('/actualite', [PostController::class, 'index'])->name('posts.index');
Route::get('/actualite/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::get('/contact', [ContactController::class, 'show'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

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
});

require __DIR__.'/settings.php';
