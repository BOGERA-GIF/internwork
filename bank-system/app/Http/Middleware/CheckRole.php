<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            // User is not logged in
            return redirect('/login');
        }

        $user = Auth::user();

        // Check if the user's role is one of the allowed roles
        if (in_array($user->role, $roles)) {
            return $next($request);
        } else {
            // User is not authorized to access this page
            return redirect('/login')->withErrors(['error' => 'You are not authorized to access this page.']);
        }
    }
}
