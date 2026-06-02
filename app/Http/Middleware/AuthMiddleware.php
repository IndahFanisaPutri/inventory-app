<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Periksa apakah pengguna sudah login menggunakan Auth::check() 
        if (!Auth::check()) {
            // Simpan URL yang diminta agar bisa diarahkan kembali setelah login 
            return redirect()->route('login')
                ->with('error', 'Silakan login terlebih dahulu untuk mengakses halaman ini.');
        }

        // Pengguna sudah login, lanjutkan request ke controller 
        return $next($request);
    }
}
