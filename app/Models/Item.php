<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use RalphJSmit\Laravel\SEO\Support\HasSEO;


class Item extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasSEO;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main-image');
        $this->addMediaCollection('image-gallery');
        $this->addMediaCollection('downloads');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->performOnCollections('main-image', 'image-gallery')
            ->format('webp')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
        $this
            ->addMediaConversion('web-image')
            ->performOnCollections('main-image', 'image-gallery')
            ->format('webp')
            ->nonQueued();
    }
}
