<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminLoggedIn
{
    /**
     * Cek apakah user sudah login. Kalau belum, tendang balik ke halaman login
     * SEBELUM controller-nya sempat dijalankan sama sekali.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->check()) {
            return redirect()->route('admin.login')
                ->with('error', 'Silakan login dulu untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}