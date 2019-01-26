<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 1) {
            return redirect()->route('superadmin');
        }
        elseif (Auth::check() && Auth::user()->role == 5) {
            return redirect()->route('academy');
        }
        elseif (Auth::check() && Auth::user()->role == 6) {
            return redirect()->route('scout');
        }
        elseif (Auth::check() && Auth::user()->role == 4) {
            return redirect()->route('team');
        }
        elseif (Auth::check() && Auth::user()->role == 3) {
            return redirect()->route('player');
        }
        elseif (Auth::check() && Auth::user()->role == 2) {
            return $next($request);
        }
        else {
            return redirect()->route('login');
        }
    }
}
