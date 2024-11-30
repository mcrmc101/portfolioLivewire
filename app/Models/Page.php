<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Conversions\Manipulations;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Page extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasSEO;

    protected $fillable = [
        'name',
        'slug',
        'content',
        'site_name',
        'site_tagline',
        'site_socials'
    ];

    protected $casts = [
        'site_socials' => 'array',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('site_logo');
        $this->addMediaCollection('social_icons');
        $this->addMediaCollection('image');
        $this->addMediaCollection('downloads');
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->performOnCollections('image')
            ->format('webp')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
        $this
            ->addMediaConversion('web-image')
            ->performOnCollections('image')
            ->format('webp')
            ->nonQueued();
    }
}
