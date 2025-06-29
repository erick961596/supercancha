<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsExternal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $isExternal =  (Auth::user()->role == 1) ? 'user' : ((Auth::user()->role == 2) ? 'advisor' : 'admin');
        if (Auth::user() &&  Auth::user()->role == '2' && Auth::user()->isExternal != '1') {
            return $next($request);
        }else{
            //abort(403, 'Unauthorized action.');
            return redirect($isExternal.'/dashboard');
        }

        return $next($request);
    }
}
