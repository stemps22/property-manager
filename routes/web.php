<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\HeroSlide;
use App\Models\Collection;
use App\Models\Testimonial;

Route::get('/', function () {
    // 1. Fetch active hero slides ordered by your preference
    $heroSlides = HeroSlide::orderBy('order', 'asc')->get();

    // 2. Fetch featured collections that are marked as active
    $collections = Collection::where('is_active', true)
        ->orderBy('order', 'asc')
        ->get();

    // 3. Fetch the 4 latest testimonials
    $testimonials = Testimonial::latest()
        ->take(4)
        ->get();

    // 4. Return the home view with all the data
    return view('home', [
        'heroSlides' => $heroSlides,
        'collections' => $collections,
        'testimonials' => $testimonials,
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

