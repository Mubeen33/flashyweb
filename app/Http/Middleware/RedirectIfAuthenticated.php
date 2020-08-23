<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        
        //custom
        switch ($guard) {
            case 'customer':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('customer.dashboard.get');
                }
                break;
            
            default:
                //not authenticate
                Auth::logout();
                return redirect('/login');
                break;
        }

        return $next($request);
    }
}
