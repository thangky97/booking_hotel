<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // $user = Auth::user();
        // // Nếu tồn tại user và user có role user
        // if ($user->role === 1) {
        //     // Cho đi tiếp
        //     return redirect()->route('route_BackEnd_Dashboard');
        // }
        // // Nếu không thì quay về dashboard
        // // dd('check admin');
        // return $next($request);
        //return redirect()->route('getLogin');

        $user = $request->user();
        // Chỉ user có role = 1 thì mới được vào xem Category
        if ($user->role !== 1) {
            // Nếu không đáp ứng đk thì tự quay về route error.404
            return redirect()->route('403');
        }
        // else ($user->role !==2  ) {
        //     return redirect()->route();
        // }

        return $next($request);
    }
}
