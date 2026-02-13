<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use App\Models\User;

class Owner extends Model
{
    protected $fillable = ['name', 'slug'];
    /**
     * Boot function to automatically generate a slug from the name.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($owner) {
            $owner->slug = Str::slug($owner->name);
        });
    }

    /**
     * Tell Filament v5 to use the 'slug' for URLs instead of the ID.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
