<?php

namespace Lunar\Base;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class StandardMediaDefinitions implements MediaDefinitionsInterface
{
    protected $fill;

    public function __construct()
    {
        $this->fill = phpversion() >= 8.2
            ? class_exists('Spatie\Image\Enums\Fit') ? \Spatie\Image\Enums\Fit::Fill : null
            : Spatie\Image\Manipulations\Manipulations::FIT_FILL; // @phpstan-ignore-line
    }

    public function registerMediaConversions(HasMedia $model, Media $media = null): void
    {
        // Add a conversion for the admin panel to use
        $model->addMediaConversion('small')
            ->fit($this->fill, 300, 300)
            ->sharpen(10)
            ->keepOriginalImageFormat();
    }

    public function registerMediaCollections(HasMedia $model): void
    {
        $fallbackUrl = config('lunar.media.fallback.url');
        $fallbackPath = config('lunar.media.fallback.path');

        // Reset to avoid duplication
        $model->mediaCollections = [];

        $collection = $model->addMediaCollection('images');

        if ($fallbackUrl) {
            $collection = $collection->useFallbackUrl($fallbackUrl);
        }

        if ($fallbackPath) {
            $collection = $collection->useFallbackPath($fallbackPath);
        }

        $this->registerCollectionConversions($collection, $model);
    }

    protected function registerCollectionConversions(MediaCollection $collection, HasMedia $model): void
    {
        $conversions = [
            'zoom' => [
                'width' => 500,
                'height' => 500,
            ],
            'large' => [
                'width' => 800,
                'height' => 800,
            ],
            'medium' => [
                'width' => 500,
                'height' => 500,
            ],
        ];

        $collection->registerMediaConversions(function (Media $media) use ($model, $conversions) {
            foreach ($conversions as $key => $conversion) {
                $model->addMediaConversion($key)
                    ->fit(
                        $this->fill,
                        $conversion['width'],
                        $conversion['height']
                    )->keepOriginalImageFormat();
            }
        });
    }

    public function getMediaCollectionTitles(): array
    {
        return [
            'images' => __('lunar::base.standard-media-definitions.collection-titles.images'),
        ];
    }

    public function getMediaCollectionDescriptions(): array
    {
        return [
            'images' => '',
        ];
    }
}
