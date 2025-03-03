<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminPassword
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the session has 'admin_logged_in'
        if (!$request->session()->has('admin_logged_in')) {
            // Redirect to the password form if not logged in
            return redirect()->route('show-admin-password-form');
        }
        
        // Allow access to the requested route if logged in
        return $next($request);
    }
}












