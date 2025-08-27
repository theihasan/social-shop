<?php

use Illuminate\Support\Facades\Route;
use Ihasan\SocialShop\Http\Controllers\DashboardController;


Route::prefix(config('social-shop.prefix'))
    ->middleware(config('social-shop.middleware'))
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('social-shop.dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('social-shop.dashboard.index');
    });