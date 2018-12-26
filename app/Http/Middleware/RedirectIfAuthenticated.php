<?php

namespace App\Http\Middleware;

use App\Models\User;
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
        if (Auth::guard($guard)->check()) {
            //Se for admin
            if (Auth::user()->role == User::ADMIN) {
                return redirect('/admin/home');
            }
            //Se for cliente
            if (Auth::user()->role == User::CLIENT) {
                return redirect('/client/home');
            }

            //Se for prestador
            return redirect('/home');
        }

        return $next($request);
    }
}
