<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Property extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['owner_id', 'title', 'price', 'address'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }
}