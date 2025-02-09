<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
if (!Auth::check()) {
        abort(403, '⛔ User is not authenticated inside middleware!');
    }

    $user = Auth::user();

    if (!$user) {
        abort(403, '⛔ User is NULL inside middleware!');
    }

    if (!$user->hasRole($role)) {
        abort(403, '⛔ User does not have the required role: ' . $role);
    }

        return $next($request);
    }
}
