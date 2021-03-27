<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PersonelMiddleware
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
        if(session()->get('personel') != null && session()->get('personel')->tip == "Personel")
            return $next($request);
        else
            return redirect()->route('girisKontrol');
    }
}
