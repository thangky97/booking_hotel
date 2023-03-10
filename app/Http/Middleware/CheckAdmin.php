<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $admin = Authenticate::admin();
        // Nếu tồn tại user và user có role admin
        if ($admin && $admin->role === 1) {
            // Cho đi tiếp
            return $next($request);
        }
        // Nếu không thì quay về dashboard
        return redirect()->route('dashboard');
    }
}
