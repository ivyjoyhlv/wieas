<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureIsVerified
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('applicant')->check() && !Auth::guard('applicant')->user()->is_verified) {
            Auth::guard('applicant')->logout();
            return redirect()->route('signin.index')->with('error', 'Please verify your email address first.');
        }

        return $next($request);
    }
}