<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravel\Cashier\Billable;

class Business extends Model
{
    use Billable;
    // Filament v5 requires this to be open for the 'schema' data to save
    protected $guarded = [];

    protected $fillable = [
        'name',
        'slug',
        'stripe_id',
        'pm_type',
        'pm_last_four',
        'trial_ends_at',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    public function subscriptions(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(\Laravel\Cashier\Subscription::class, 'billable');
    }
}
