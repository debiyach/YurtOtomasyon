<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OgrenciMiddleware
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
        if(session()->get('ogrenci') != null && session()->get('ogrenci'))
            return $next($request);
        else
            return redirect()->route('girisKontrol');
    }
}
