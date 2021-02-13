<?php

namespace App\Http\Middleware;

use Closure;

class CekLogin
{
    public function handle($request, Closure $next)
    {
        // $users = session('data_login');
        if (session('data_login')) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
