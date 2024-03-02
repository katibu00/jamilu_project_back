<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstructorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Get the authenticated user
            $user = Auth::user();
            
            // Check if the user's role is instructor
            if ($user->role === 'instructor') {
                return $next($request);
            }
        }

        // Redirect unauthorized users
        return redirect()->route('login');
    }
}
