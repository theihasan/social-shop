# Social Shop is a Laravel package for social commerce. It lets vendors sync product catalogs with Meta, manage inventory and pricing, handle orders, and enable customer checkout—all inside Laravel. Built with Vue 3 + Inertia.js, it’s extendable and ideal for developers delivering polished F-commerce solutions.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/theihasan/social-shop.svg?style=flat-square)](https://packagist.org/packages/theihasan/social-shop)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/theihasan/social-shop/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/theihasan/social-shop/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/theihasan/social-shop/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/theihasan/social-shop/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/theihasan/social-shop.svg?style=flat-square)](https://packagist.org/packages/theihasan/social-shop)

## Features

- 📊 **Modern Dashboard** - Beautiful Vue 3 + Inertia.js interface with TailwindCSS
- 🛒 **Product Catalog Management** - Sync products with Facebook and Instagram shops
- 📋 **Order Management** - Track and manage orders from social platforms
- 👥 **Team Management** - Multi-user access with role-based permissions
- 📈 **Analytics & KPIs** - Revenue tracking, order metrics, and performance insights
- ⚡ **Real-time Updates** - Activity timeline and live notifications
- 🎨 **Customizable** - Extendable components and theming support

## Screenshots

![Dashboard Overview](https://via.placeholder.com/800x400/1877F2/FFFFFF?text=Social+Shop+Dashboard)

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/social-shop.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/social-shop)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Requirements

- PHP 8.2 or higher
- Laravel 11 or 12
- Vue 3 with Inertia.js
- TailwindCSS v4

## Installation

1. **Install the package via Composer:**

```bash
composer require theihasan/social-shop
```

2. **Publish and run the migrations:**

```bash
php artisan vendor:publish --tag="social-shop-migrations"
php artisan migrate
```

3. **Publish the assets (Vue components, CSS):**

```bash
php artisan vendor:publish --tag="social-shop-assets"
```

4. **Update your TailwindCSS configuration:**

Add the Social Shop colors to your `resources/css/app.css`:

```css
@theme {
    --color-meta-blue: #1877F2;
    --color-meta-blue-dark: #166FE5;
    --color-meta-blue-light: #E7F3FF;
}
```

Update your `tailwind.config.js` to include the package files:

```js
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/js/vendor/social-shop/**/*.vue", // Add this line
  ],
  // ... rest of your config
}
```

5. **Update your Inertia.js app.js to resolve package components:**

```js
import { createInertiaApp } from '@inertiajs/vue3'

createInertiaApp({
    resolve: (name) => resolvePageComponent(
        name.includes('vendor/') ? `./${name}.vue` : `./Pages/${name}.vue`,
        import.meta.glob([
            './Pages/**/*.vue',
            './vendor/**/*.vue' // Add this line
        ])
    ),
    // ... rest of your config
})
```

6. **Build your assets:**

```bash
npm run build
```

7. **Publish the config file (optional):**

```bash
php artisan vendor:publish --tag="social-shop-config"
```

This will publish the configuration file to `config/social-shop.php`:

```php
return [
    'prefix' => 'social-shop',
    'middleware' => ['web'],
    'meta' => [
        'app_id' => env('FACEBOOK_APP_ID'),
        'app_secret' => env('FACEBOOK_APP_SECRET'),
    ],
];
```

## Usage

### Accessing the Dashboard

Once installed, you can access the Social Shop dashboard at:

```
https://your-app.com/social-shop/dashboard
```

### Available Routes

The package registers the following routes:

- `GET /social-shop/dashboard` - Main dashboard with KPIs and overview
- `GET /social-shop/catalog` - Product catalog management
- `GET /social-shop/orders` - Order management interface  
- `GET /social-shop/users` - Team member management
- `GET /social-shop/facebook` - Facebook Shop settings
- `GET /social-shop/instagram` - Instagram Shop settings
- `GET /social-shop/settings` - General package settings

### Customizing Routes

You can customize the route prefix and middleware in the config file:

```php
// config/social-shop.php
return [
    'prefix' => 'admin/social-shop', // Custom prefix
    'middleware' => ['web', 'auth'], // Add authentication
];
```

### Extending Controllers

You can extend the package controllers to add custom functionality:

```php
use Ihasan\SocialShop\Http\Controllers\DashboardController as BaseDashboardController;

class CustomDashboardController extends BaseDashboardController
{
    public function index()
    {
        $data = parent::index();
        
        // Add your custom data
        $data['customData'] = $this->getCustomData();
        
        return $data;
    }
    
    private function getCustomData()
    {
        // Your custom logic here
        return [];
    }
}
```

### Customizing Views

All Vue components are published to `resources/js/vendor/social-shop/` and can be customized:

```
resources/js/vendor/social-shop/
├── Components/
│   ├── KPICard.vue
│   ├── Sidebar.vue
│   └── ...
├── Layouts/
│   └── DashboardLayout.vue
└── Pages/
    └── Dashboard.vue
```

### Adding Custom Middleware

You can add custom middleware to protect routes:

```php
// In your RouteServiceProvider or web.php
Route::middleware(['auth', 'verified'])->group(function () {
    // Social Shop routes will inherit these middleware
});
```

### Environment Variables

Add these to your `.env` file for Meta integration:

```env
FACEBOOK_APP_ID=your_facebook_app_id
FACEBOOK_APP_SECRET=your_facebook_app_secret
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Abul Hassan](https://github.com/theihasan)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
