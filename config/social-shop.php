<?php

use App\Http\Middleware\HandleInertiaRequests;
use function Termwind\render;


return [
    'route_prefix' => env('SOCIAL_SHOP_ROUTE_PREFIX', 'social-shop'),
    'middleware' => ['web', HandleInertiaRequests::class],
];
