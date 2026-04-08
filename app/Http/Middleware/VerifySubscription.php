<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifySubscription
{
    /**
     * Checks if the current tenant (Business) has an active subscription.
     * If not, it redirects them to the billing portal.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        $tenant = Filament::getTenant();

        if ($user && $user->isSuperAdmin()) {
            return $next($request);
        }
        if ($request->routeIs('billing.portal') || $request->routeIs('filament.admin.pages.pricing')) {
            return $next($request);
        }
        // If there is no tenant, or the business is not subscribed, 
        // redirect to the billing portal we defined earlier.
        if (! $tenant || ! $tenant->subscribed()) {
            return redirect()->route('billing.portal', ['tenant' => $tenant]);
        }

        return $next($request);
    }
}