<?php

namespace Ihasan\SocialShop;

use Ihasan\SocialShop\Commands\SocialShopCommand;
use Inertia\Middleware;
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
            ->hasMigrations([
                'create_social_shop_table',
            ])
            ->hasCommand(SocialShopCommand::class);
    }

    public function packageBooted(): void
    {
        $this->publishes([
            __DIR__.'/../config/social-shop.php' => config_path('social-shop.php'),
            __DIR__.'/../resources/views' => resource_path('views/vendor/social-shop'),
            __DIR__.'/../database/migrations' => database_path('migrations'),
        ], 'social-shop');

        // Inertia Assets
        $this->publishes([
            __DIR__.'/../resources/js' => resource_path('js/vendor/social-shop'),
            __DIR__.'/../stubs/vite.social-shop.config.js' => base_path('vite.social-shop.config.js'),
            // __DIR__ . '/../stubs/package.json.stub' => base_path('package.social-shop.json'), // Optional: for reference
        ], 'social-shop-assets');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'social-shop');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'social-shop');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->app['router']->aliasMiddleware('inertia', Middleware::class);
    }

    public function packageRegistered(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/social-shop.php', 'social-shop');
    }
}
