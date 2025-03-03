<?php

// app/Http/Kernel.php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to individual routes.
     *
     * @var array
     */
    // Middleware for all classes//
    protected $routeMiddleware = [
        'author.password' => \App\Http\Middleware\CheckAuthorPassword::class, 
        'admin.password' => \App\Http\Middleware\CheckAdminPassword::class,
        'check.login' => \App\Http\Middleware\CheckLogin::class,
        'check.register' => \App\Http\Middleware\CheckRegister::class,
        'admin' => \App\Http\Middleware\CheckAdmin::class,
    ];
    
    
    
}







