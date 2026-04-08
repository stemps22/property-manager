<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Config;
use Filament\Support\Icons\Heroicon;

class Pricing extends Page
{
    protected string $view = 'filament.pages.pricing';
    protected static string | BackedEnum | null $navigationIcon = Heroicon::OutlinedCreditCard;
    protected static bool $shouldRegisterNavigation = false; // Hide from sidebar

    public function getPlans(): array
    {
        return Config::get('billing.plans');
    }

    /**
     * This handles the button click to start a Stripe Checkout session.
     */
    public function subscribe(string $planKey)
    {
        $business = filament()->getTenant();
        $priceId = Config::get("billing.plans.{$planKey}.id");

        // Start a Stripe Checkout session
        $checkout = $business->newSubscription('default', $priceId)
        ->checkout([
            'success_url' => route('filament.admin.pages.dashboard', ['tenant' => $business->slug]),
            'cancel_url' => route('filament.admin.pages.pricing', ['tenant' => $business->slug]),
        ]);

    // Now this line is reachable and will trigger the redirect
    return redirect()->away($checkout->url);
    }
}