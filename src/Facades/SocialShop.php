<?php

namespace Ihasan\SocialShop\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ihasan\SocialShop\SocialShop
 */
class SocialShop extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Ihasan\SocialShop\SocialShop::class;
    }
}
