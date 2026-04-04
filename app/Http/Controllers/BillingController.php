<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Redirect the Business Admin to the Stripe Customer Portal.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        // Get the current business (tenant)
        $business = $request->user()->latestBusiness;

        // Redirect to the portal, returning to the dashboard afterward
        return $business->redirectToBillingPortal(
            route('filament.admin.pages.dashboard')
        );
    }
}
