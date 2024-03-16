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

    'fit' => ! class_exists('Spatie\Image\Manipulations\Manipulations') ? [
        'fill' => Spatie\Image\Enums\Fit::Fill,
        'contain' => Spatie\Image\Enums\Fit::Contain,
        'max' => Spatie\Image\Enums\Fit::Max,
        'stretch' => Spatie\Image\Enums\Fit::Stretch,
        'crop' => Spatie\Image\Enums\Fit::Crop,
    ] : [
        'fill' => Spatie\Image\Manipulations\Manipulations::FIT_FILL,
        'contain' => Spatie\Image\Manipulations\Manipulations::FIT_CONTAIN,
        'max' => Spatie\Image\Manipulations\Manipulations::FIT_MAX,
        'stretch' => Spatie\Image\Manipulations\Manipulations::FIT_STRETCH,
        'crop' => Spatie\Image\Manipulations\Manipulations::FIT_CROP,
    ],
];
