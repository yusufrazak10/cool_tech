<?php
// app/Http/Middleware/CheckAdmin.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and has the 'admin' role
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request);
        }
        
        // If not an admin, redirect to login page
        return redirect()->route('login.form')->withErrors('You must be an admin to access this page.');
    }
}


