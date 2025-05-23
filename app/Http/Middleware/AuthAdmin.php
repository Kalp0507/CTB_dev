<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        if (Auth::user()->utype == 'ADM') {
            return $next($request);
        }
        else {
            // Auth::logout();
            // $request->session()->invalidate();

            // $request->session()->regenerateToken();
            return redirect('login');
        }
    }
}
