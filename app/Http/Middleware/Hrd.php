<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Hrd
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
        if (Auth::check()&&Auth::user()->role=='hrd'||Auth::user()->role=='admin'||Auth::user()->role=='ceo' ) {
            return $next($request);
        } else {
            return back();
        }
    }
}
