<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (Auth::user()->isAdmin()) {
                    // return redirect()->route('office.dubai');
                    return redirect(RouteServiceProvider::HOMEDUBAI);
                }
                
                if (Auth::user()->isTurkey()) {
                    // return redirect()->route('office.turkey');
                    return redirect(RouteServiceProvider::HOMETURKEY);
                }

                if (Auth::user()->isDubai()) {
                    // return redirect()->route('office.dubai');
                    return redirect(RouteServiceProvider::HOMEDUBAI);
                }

                if (Auth::user()->isVanuatu()) {
                    // return redirect()->route('office.vanuatu');
                    return redirect(RouteServiceProvider::HOMEVANUATU);
                }                                
            }
        }

        return $next($request);
    }
}
