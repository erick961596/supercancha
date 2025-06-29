<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectByRole
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->hasRole('admin') && !$request->is('admin*')) {
                return redirect()->route('admin.dashboard');
            }

            if ($user->hasRole('owner') && !$request->is('owner*')) {
                return redirect()->route('owner.dashboard');
            }

            if ($user->hasRole('player') && !$request->is('player*')) {
                return redirect()->route('player.dashboard');
            }
        }

        return $next($request);
    }
}
