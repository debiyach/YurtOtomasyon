<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginMiddleware
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
        /**
         * Burada E-mail - Şifre Kontrolleri Yapılacak
         * @author Ömer Faruk GÖL <omerfarukgol@hotmail.com>
         */
        return $next($request);
    }
}
