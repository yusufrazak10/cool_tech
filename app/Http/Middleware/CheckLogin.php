<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        // If the user is already logged in, redirect to the dashboard
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        
        return $next($request);
    }
}




