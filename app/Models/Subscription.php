<?php

namespace App\Models;

use Laravel\Cashier\Subscription as CashierSubscription;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends CashierSubscription
{
    /**
     * Link the subscription back to the Business (Tenant).
     * This allows TextColumn::make('tenant.name') to work in your table.
     */
    public function tenant(): BelongsTo
    {
        // Adjust 'business_id' if your foreign key is named differently
        return $this->belongsTo(Business::class, 'business_id');
    }
}