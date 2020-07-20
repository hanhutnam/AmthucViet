<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use Auth;

class CustomAuth
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
        if(Auth::user())
        {
            return $next($request);
        }
        else 
            return redirect()->route('user.login');
    }
}
