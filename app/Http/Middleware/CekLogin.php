<?php

namespace App\Http\Middleware;

use Closure;

class CekLogin
{
    public function handle($request, Closure $next)
    {
        if (session('data_login')) {
            return $next($request);
        }
        return redirect()->route('login');
    }
}
