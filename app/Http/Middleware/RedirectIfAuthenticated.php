<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                // $url='';
                // if (Auth()->user()->role == 1) {
                //     $url = route('admin.dashboard');
                // } elseif (Auth()->user()->role ==2) {
                //     $url = route('userDashboard');
                // }
                return redirect()->route('dashboard');
                // return view('Admin-Panel.dashboard');
                // return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
