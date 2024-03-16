<?php

use Lunar\Base\StandardMediaDefinitions;

return [

    'definitions' => [
        Lunar\Models\Asset::class => StandardMediaDefinitions::class,
        Lunar\Models\Brand::class => StandardMediaDefinitions::class,
        Lunar\Models\Collection::class => StandardMediaDefinitions::class,
        Lunar\Models\Product::class => StandardMediaDefinitions::class,
        Lunar\Models\ProductOption::class => StandardMediaDefinitions::class,
        Lunar\Models\ProductOptionValue::class => StandardMediaDefinitions::class,
    ],

    'fallback' => [
        'url' => env('FALLBACK_IMAGE_URL', null),
        'path' => env('FALLBACK_IMAGE_PATH', null),
    ],

    'fit' => [
        // @phpstan-ignore-next-line
        'fill' => phpversion() >= 8.2 ? Spatie\Image\Enums\Fit::Fill : Spatie\Image\Manipulations\Manipulations::FIT_FILL,
        // @phpstan-ignore-next-line
        'contain' => phpversion() >= 8.2 ? Spatie\Image\Enums\Fit::Contain : Spatie\Image\Manipulations\Manipulations::FIT_CONTAIN,
        // @phpstan-ignore-next-line
        'max' => phpversion() >= 8.2 ? Spatie\Image\Enums\Fit::Max : Spatie\Image\Manipulations\Manipulations::FIT_MAX,
        // @phpstan-ignore-next-line
        'stretch' => phpversion() >= 8.2 ? Spatie\Image\Enums\Fit::Stretch : Spatie\Image\Manipulations\Manipulations::FIT_STRETCH,
        // @phpstan-ignore-next-line
        'crop' => phpversion() >= 8.2 ? Spatie\Image\Enums\Fit::Crop : Spatie\Image\Manipulations\Manipulations::FIT_CROP,
    ],
];
