<?php

namespace App\Filament\Billing;

use App\Http\Middleware\VerifySubscription;
use Closure;
use Filament\Billing\Providers\Contracts\BillingProvider as BillingProviderInterface;
use Illuminate\Database\Eloquent\Model;

class BillingProvider implements BillingProviderInterface
{
    /**
     * Returns the route to hit when the billing button is clicked.
     */
    public function getRouteAction(): string | Closure
    {
        return fn (Model $tenant): string => route('billing.portal', [
            'tenant' => $tenant,
        ]);
    }

    /**
     * Returns the middleware that checks for an active subscription.
     */
    public function getSubscribedMiddleware(): string
    {
        return \App\Http\Middleware\VerifySubscription::class;
    }
}