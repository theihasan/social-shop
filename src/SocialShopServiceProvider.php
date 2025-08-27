<?php

namespace Ihasan\SocialShop;

use Ihasan\SocialShop\Commands\SocialShopCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SocialShopServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('social-shop')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_social_shop_table')
            ->hasCommand(SocialShopCommand::class);
    }
}
