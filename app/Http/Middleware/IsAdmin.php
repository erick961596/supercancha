<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $role = (Auth::user()->role == 1) ? 'user' : ((Auth::user()->role == 2) ? 'advisor' : 'admin');
        if (Auth::user() &&  Auth::user()->role == '2' || Auth::user()->role == '3') {
            return $next($request);
    }else{
    //abort(403, 'Unauthorized action.');
    return redirect($role.'/dashboard');
    }

    return $next($request);
    }
}
