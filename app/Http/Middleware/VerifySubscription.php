<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifySubscription
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $business = $request->user()?->latestBusiness;

        // If the business doesn't have an active subscription,
        // redirect them to the billing page.
        if ($business && ! $business->subscribed('default')) {
            return redirect()->route('billing.portal')
                ->with('error', 'Please subscribe to a plan to start adding properties.');
        }

        return $next($request);
    }
}
