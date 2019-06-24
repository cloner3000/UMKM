<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Support\Facades\Auth;

class BuyerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            return redirect()->back()
                ->with('error_login', 'Proses yang Anda minta memerlukan otentikasi, silahkan masuk ke akun Anda.');
        }
        return $next($request); //lanjur ke prosess berikutnya
    }
}
