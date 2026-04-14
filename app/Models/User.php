<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Models\Contracts\HasTenants;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Laravel\Sanctum\HasApiTokens;
use Jeffgreco13\FilamentBreezy\Traits\TwoFactorAuthenticatable;



class User extends Authenticatable implements FilamentUser, HasTenants
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'owner_id',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Tenancy Relationships and Methods
     */

    public function businesses(): BelongsToMany
    {
        return $this->belongsToMany(Business::class);
    }
    // Assume you have an 'is_admin' boolean or similar check
    public function canAccessPanel(Panel $panel): bool
    {
        // Layer 1: Super Admin Access
        if ($panel->getId() === 'admin') {
            return (bool) $this->is_admin && $this->role === 'super_admin';
        }

        // Layer 2: Client Access
        if ($panel->getId() === 'app') {
            return true; // Any authenticated user with a tenant can enter
        }

        return false;
    }
    public function getTenants(Panel $panel): array|Collection
    {
        return $this->businesses;
    }

    public function canAccessTenant(Model $tenant): bool
    {
        return $this->businesses()->where('businesses.id', $tenant->id)->exists();
    }
    public function isSuperAdmin(): bool
    {
        // Example 1: Check a list of specific emails
        /*$admins = [
            'admin@yourdomain.com',
        ];

        return in_array($this->email, $admins);*/

        // Example 2: If you have a 'role' column in your users table:
        return $this->role === 'super_admin';
    }
}
