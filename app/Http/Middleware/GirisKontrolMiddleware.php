<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GirisKontrolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->get('personel') != null && session()->get('personel')->tip == "Müdür")
            return redirect()->route('mudur.index');
        elseif(session()->get('personel') != null && session()->get('personel')->tip == "Personel")
            return redirect()->route('personel.index');
        elseif(session()->get('ogrenci') != null && session()->get('ogrenci'))
            return redirect()->route('ogrenci.index');
        else
            return $next($request);
    }
}
