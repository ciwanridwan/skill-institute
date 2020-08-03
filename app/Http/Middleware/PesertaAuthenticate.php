<?php

namespace App\Http\Middleware;

use Closure;

class PesertaAuthenticate
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
        //JADI KITA CEK, JIKA GUARD PESERTA BELUM LOGIN
        if (!auth()->guard('peserta')->check()) {
            //MAKA REDIRECT KE HALAMAN LOGIN
            return redirect(route('login-peserta'));
        }
        //JIKA SUDAH MAKA REQUEST YANG DIMINTA AKAN DISEDIAKAN
        return $next($request);
    }
}
