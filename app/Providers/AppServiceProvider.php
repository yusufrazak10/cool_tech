<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\CookieNotification;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Leave this empty for now, no need to register anything here.
    }
    
    public function boot(): void
    {
        // Register the CookieNotification component for Blade
        Blade::component('cookie-notification', CookieNotification::class);
    }
}


