<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $userRole = $request->user()->role;

        if ($userRole == 1 && $role != 1 ) {

            return redirect('admin/dashboard');

        }elseif ($userRole == 2 && $role != 2) {

            return redirect('/user/dashboard');

        }
        return $next($request);
    }
}
