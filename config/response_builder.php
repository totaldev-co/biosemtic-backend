<?php

return [
    /*
    |-----------------------------------------------------------------------------------------------------------
    | Code range settings
    |-----------------------------------------------------------------------------------------------------------
    */
    'min_code' => 0,
    'max_code' => 1024,

    /*
    |-----------------------------------------------------------------------------------------------------------
    | Response structure configuration
    |-----------------------------------------------------------------------------------------------------------
    */
    'encoding_options' => JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE,

    /*
    |-----------------------------------------------------------------------------------------------------------
    | Debug mode configuration
    |-----------------------------------------------------------------------------------------------------------
    */
    'debug' => [
        'debug_key' => 'debug',
        'exception_handler' => [
            'trace_key' => 'trace',
            'trace_enabled' => env('APP_DEBUG', false),
        ],
    ],

    /*
    |-----------------------------------------------------------------------------------------------------------
    | Data converter configuration
    |-----------------------------------------------------------------------------------------------------------
    */
    'converter' => [
        'primitives' => [
            'array' => [
                'key' => 'items',
            ],
        ],
        'classes' => [
            \Illuminate\Database\Eloquent\Model::class => [
                'handler' => \MarcinOrlowski\ResponseBuilder\Converters\ToArrayConverter::class,
                'key' => 'item',
                'pri' => 0,
            ],
            \Illuminate\Database\Eloquent\Collection::class => [
                'handler' => \MarcinOrlowski\ResponseBuilder\Converters\ToArrayConverter::class,
                'key' => 'items',
                'pri' => 0,
            ],
            \Illuminate\Support\Collection::class => [
                'handler' => \MarcinOrlowski\ResponseBuilder\Converters\ToArrayConverter::class,
                'key' => 'items',
                'pri' => 0,
            ],
            \Illuminate\Pagination\LengthAwarePaginator::class => [
                'handler' => \MarcinOrlowski\ResponseBuilder\Converters\ToArrayConverter::class,
                'key' => null,
                'pri' => 0,
            ],
        ],
    ],
];
