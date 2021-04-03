<?php

namespace App\Http\Controllers\Ogrenci;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ResultType;
use App\Models\Ogrenci;
use App\Models\Personel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthLoginController extends ApiController
{
    public function authLoginOgrenci(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ],
            [
                'email.required' => 'Email alanı gereklidir!',
                'email.email' => 'Email alanı email tipine uygun olmalıdır!',
                'password.required' => 'Password alanı gereklidir!',
            ]);

        if ($validator->fails()) {
            return $this->apiResponse(ResultType::Error, $validator->errors() ?? 'sa', null, JsonResponse::HTTP_NOT_FOUND,);
        }

        $user = Ogrenci::where('mail', $request->email)->first();
        return $this->userLogin($request, $user);

    }

    public function authLoginPersonel(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ],
            [
                'email.required' => 'Email alanı gereklidir!',
                'email.email' => 'Email alanı email tipine uygun olmalıdır!',
                'password.required' => 'Password alanı gereklidir!',
            ]);

        if ($validator->fails()) {
            return $this->apiResponse(ResultType::Error, $validator->errors() ?? 'sa', null, JsonResponse::HTTP_NOT_FOUND,);
        }

        $user = Personel::where('mail', $request->email)->first();
        return $this->userLogin($request, $user);

    }


    protected function userLogin($request, $user)
    {
        if ($user) {
            if (Hash::check($request->password, $user->sifre)) {
                $newToken = Str::random(60);
                $user->update(['apiToken' => $newToken]);
                $data = ['email' => $request->email,
                    'apiToken' => $newToken,
                    'time' => now()];
                if($user->tip) $data['tip'] =$user->tip;
                return $this->apiResponse(ResultType::Success, $data, 'Kullanıcı girişi başarılı!', 200);
            } else return $this->apiResponse(ResultType::Error, null, 'Geçersiz parola!', JsonResponse::HTTP_NOT_FOUND,);
        } else return $this->apiResponse(ResultType::Error, null, 'Kullanıcı bulunamadı!', JsonResponse::HTTP_NOT_FOUND,);
    }
}
