<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Support\Facades\Auth;

class DiskopMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::user()->role_id == 2 || Auth::user()->role_id == 1){
                return $next($request); //lanjur ke prosess berikutnya
            }
        } else{
            return $next($request); //lanjut ke halaman Login
        }
        return response()->view('error.403');
    }
}
