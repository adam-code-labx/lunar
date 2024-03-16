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
        'fill' => phpversion() >= 8.2 ? Spatie\Image\Enums\Fit::Fill : Spatie\Image\Manipulations\Manipulations::FIT_FILL,
        'contain' => phpversion() >= 8.2 ? Spatie\Image\Enums\Fit::Contain : Spatie\Image\Manipulations\Manipulations::FIT_CONTAIN,
        'max' => phpversion() >= 8.2 ? Spatie\Image\Enums\Fit::Max : Spatie\Image\Manipulations\Manipulations::FIT_MAX,
        'stretch' => phpversion() >= 8.2 ? Spatie\Image\Enums\Fit::Stretch : Spatie\Image\Manipulations\Manipulations::FIT_STRETCH,
        'crop' => phpversion() >= 8.2 ? Spatie\Image\Enums\Fit::Crop : Spatie\Image\Manipulations\Manipulations::FIT_CROP,
    ],
];
