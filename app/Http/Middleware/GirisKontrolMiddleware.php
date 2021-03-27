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
        if(session()->get('personelGiris')->tip == "Müdür")
            return redirect()->route('mudur.index');
        elseif(session()->get('personelGiris')->tip == "Personel")
            return redirect()->route('personel.index');
        elseif(session()->get('ogrenciGiris'))
            return redirect()->route('ogrenci.index');
        else
            return $next($request);
    }
}
