<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (auth()->check() && in_array(auth()->user()->role, $roles)) {
            return $next($request);
        }

        switch (auth()->user()->role) {
            case 'Pengguna':
                return redirect()->route('homepages')->with('error', 'You do not have permission to access this page.');
            case 'Kasir':
                return redirect()->route('kasir')->with('error', 'You do not have permission to access this page.');
            case 'Pelayan':
                return redirect()->route('homepelayan')->with('error', 'You do not have permission to access this page.');
            case 'Koki':
                return redirect()->route('homekoki')->with('error', 'You do not have permission to access this page.');
            case 'Pemilik':
                return redirect()->route('homeadmin')->with('error', 'You do not have permission to access this page.');
            default:
                return redirect()->route('login.user')->with('error', 'You do not have permission to access this page.');
        }
    }
}
