<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomCKFinderAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

     public function handle($request, Closure $next)
     {
        if (Auth::check()) {
            config(['ckfinder.authentication' => function() use ($request) {
                return true;
            }] );
        } else {
            config(['ckfinder.authentication' => function() use ($request) {
                return false;
            }] );
        }

        return $next($request);
    }
}
