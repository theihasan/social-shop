<?php

use Illuminate\Support\Facades\Route;



Route::prefix(config('social-shop.prefix'))
    ->middleware(config('social-shop.middleware'))
    ->group(function () {
       
    });