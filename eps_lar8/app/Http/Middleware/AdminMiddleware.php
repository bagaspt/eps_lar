<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Cek apakah is_admin=true pada sesi
        if (!$request->session()->has('is_admin') || !$request->session()->get('is_admin')) {
            return redirect()->route('admin.login')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
