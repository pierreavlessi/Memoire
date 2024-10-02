<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Users
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
        if (!Auth::check()) {
            return redirect()->route('login');

        }

        if (Auth::check() && Auth::utilisateur()->role_name == 'admin') {
            return redirect()->route('admin/home');
        }

        if (Auth::check() && Auth::utilisateur()->role_name == 'utilisateurss') {
            
            return $next($request);
        }

      /*  if (!Auth::check()) {
            return redirect()->route('login');

        }
        if (Auth::check() ) {
            //return redirect('/');
            return $next($request);
        }*/


        // return $next($request);
    }
}
