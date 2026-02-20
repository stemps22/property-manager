<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Property extends Model implements HasMedia
{
    use InteractsWithMedia;

    //protected $fillable = ['business_id', 'title', 'price', 'address', 'status', 'is_published'];
    protected $guarded = [];

    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
{
    return $this->belongsTo(Business::class);
}

public function registerMediaConversions(Media $media = null): void
{
    $this->addMediaConversion('thumb')
        ->width(200)   // Small enough for the table
        ->height(200)
        ->sharpen(10)  // Makes it look crisp
        ->nonQueued(); // This makes it happen instantly during upload
        $this->addMediaConversion('preview')
            ->width(800)
            ->withResponsiveImages();
}
public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
