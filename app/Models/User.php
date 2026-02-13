<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use App\Models\Owner;

class User extends Authenticatable implements FilamentUser, HasTenants
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // --- FILAMENT TENANCY METHODS ---

    /**
     * Requirement 1: Tell Filament which "Owners" this user belongs to.
     */
    public function getTenants(Panel $panel): Collection
    {
        return $this->owners; // Returns the businesses linked to this user
    }

    public function canAccessTenant(Model $tenant): bool
    {
        return $this->owners->contains($tenant);
    }

    /**
     * Requirement 3: Define the relationship to the Owner model.
     */
    public function owners(): BelongsToMany
    {
        return $this->belongsToMany(Owner::class);
    }

    /**
     * Requirement 4: Basic permission to even see the Filament login page.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        return true; // You can add logic here like: str_ends_with($this->email, '@yourdomain.com')
    }
}
