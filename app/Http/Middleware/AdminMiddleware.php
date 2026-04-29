<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Middleware untuk melindungi halaman admin.
     *
     * Alur pengecekan:
     * 1. Jika user belum login → redirect ke halaman login
     * 2. Jika user login tapi bukan admin → abort 403 + logging
     * 3. Jika user admin → lanjutkan request
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Cek apakah user adalah admin
        if (!auth()->user()->isAdmin()) {
            // Logging: user biasa mencoba mengakses halaman admin
            Log::warning('Unauthorized admin access attempt.', [
                'user_id' => auth()->id(),
                'email' => auth()->user()->email,
                'ip' => $request->ip(),
                'url' => $request->fullUrl(),
            ]);

            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
