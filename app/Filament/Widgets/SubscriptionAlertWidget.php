<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Filament\Facades\Filament;

class SubscriptionAlertWidget extends Widget
{
    /**
     * Corrected: Removed the 'static' keyword to match the parent class.
     */
    protected string $view = 'filament.widgets.subscription-alert-widget';

    /**
     * Spans the full width of the dashboard grid.
     */
    protected int | string | array $columnSpan = 'full';

    /**
     * Only show this widget if the tenant (Business) is NOT subscribed.
     */
    public static function canView(): bool
    {
        $user = auth()->user();
        $tenant = Filament::getTenant();

        // Hide for Super-Admins or if no tenant context is active
        if ($user?->role === 'super-admin' || ! $tenant) {
            return false;
        }

        // Only show if they do not have an active subscription
        return ! $tenant->subscribed('default');
    }
}
