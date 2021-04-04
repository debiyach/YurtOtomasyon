<?php

namespace App\Http\Middleware;

use App\Models\Ogrenci;
use App\Models\Personel;
use Closure;
use Illuminate\Http\Request;

class ApiLogin
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



        $req = \Validator::make($request->header(),[
            'apiToken' => 'required'
        ]);

        if ($req){
            $ogrenci = Ogrenci::where('apiToken',$request->header('apiToken'))->first();
            $personel = Personel::where('apiToken',$request->header('apiToken'))->first();

            if ($personel || $ogrenci)
                return $next($request);
            else return response(['success'=>false,'message'=>'Geçersiz token!'],200);
        }else
            return response(['success'=> false,'message'=>'apiToken gereklidir!']);




    }
}
