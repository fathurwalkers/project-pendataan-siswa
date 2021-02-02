<?php

namespace App\Http\Middleware;

use Closure;

class CekLogin
{
    public function handle($request, Closure $next)
    {
        $users = session('data_login');
        if (!$users) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
