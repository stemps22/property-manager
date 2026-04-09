<?php

namespace App\Models;

use Laravel\Cashier\Subscription as CashierSubscription;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends CashierSubscription
{
    /**
     * We extend the Cashier model so all Stripe logic remains intact,
     * but we provide a local class for Filament to hook into.
     */
    
    public function business(): BelongsTo
    {
        // This links the subscription back to your tenant
        return $this->belongsTo(Business::class, 'billable_id');
    }
}