<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use App\Traits\ValidateTokenFirstAppTrait;

/**
 * ValidateFirstAppToken
 */
class ValidateFirstAppToken
{
    public function handle(Request $request, Closure $next)
    {
        $token = $request->query('token');

        // If no token provided log the error and return the user to the first app
        if (!$token) {
            Log::error('Error in class ValidateFirstAppToken: Token missing');
            return Inertia::location(config('firstapp.home_url'));
        }
        // If token validation failed log the errorr and return the user to the first app
        if (!ValidateTokenFirstAppTrait::validate($token, $request)) {
            Log::error('Error in class ValidateFirstAppToken: Invalid token');
            return Inertia::location(config('firstapp.home_url'));
        }

        return $next($request);
    }
}
