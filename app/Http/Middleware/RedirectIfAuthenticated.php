<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                //return redirect(RouteServiceProvider::HOME);

                switch (auth()->user()->role) {
                    case 1:
                        return redirect('/player/dashboard');
                        break;
                    case 2:
                        return redirect('/owner/dashboard');
                        break;
                    case 3:
                        return redirect('/admin/dashboard');
                        break;
                    default:
                        return redirect()->route('login');
                        break;
                }

            }
        }

        return $next($request);
    }
}
