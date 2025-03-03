<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAuthorPassword
{
    public function handle(Request $request, Closure $next)
    {
        // If the session does not have a valid password, redirect to the password form
        if (!$request->session()->has('author_authenticated') || !$request->session()->get('author_authenticated')) {
            return redirect()->route('show-password-form');
        }
        
        return $next($request);
    }
}









