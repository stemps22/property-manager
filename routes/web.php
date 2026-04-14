<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\HeroSlide;
use App\Models\Collection;
use App\Models\Testimonial;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

Route::get('/test-me', function () {
    return 'Server is working!';
});

/*Route::post('stripe/webhook', function (Request $request) {
    try {
        // Using the full, absolute namespace to avoid the "Target class not found" error
        return app(\Laravel\Cashier\Http\Controllers\WebhookController::class)->handleWebhook($request);
    } catch (\Throwable $e) {
        $errorInfo = [
            'Message' => $e->getMessage(),
            'File' => $e->getFile(),
            'Line' => $e->getLine(),
        ];
        
        file_put_contents(base_path('STRIPE_CRASH.txt'), print_r($errorInfo, true));
        
        return response('Error Logged', 500);
    }
});*/

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

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

/*Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/{tenant}/billing', function ($tenant) {
    $business = \App\Models\Business::where('slug', $tenant)->firstOrFail();

    // If they are NOT subscribed, send them to the Pricing Page
    if (! $business->subscribed('default')) {
        return redirect()->route('filament.admin.pages.pricing', ['tenant' => $tenant]);
    }

    // If they ARE subscribed, send them to the Stripe Management Portal
    return $business->redirectToBillingPortal(
        route('filament.admin.pages.dashboard', ['tenant' => $tenant])
    );
})->name('billing.portal');

});*/

/*Route::get('/billing-portal', function () {
        // This is a placeholder. 
        // When you are ready, this will redirect to Stripe or Spark.
        return 'Billing Portal Logic Goes Here';
    })->name('billing.portal');*/


    
require __DIR__.'/auth.php';

