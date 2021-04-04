<?php

namespace App\Http\Controllers\Api\Personel;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ResultType;
use App\Http\Requests\Api\General\ChangePasswordRequest;
use App\Http\Requests\Api\Personel\PersonelStoreRequest;
use App\Mail\SendPasswordMail;
use App\Models\Personel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PersonelApiController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return Personel[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return Personel::all();
    }

    /**
     * @param PersonelStoreRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function store(PersonelStoreRequest $request)
    {
        $input = $request->all();
        $personel = new Personel();
        $newPassword = Str::random(8);
        $apiToken = Str::random(60);
        $personel->kurumId = $request->kurumId;
        $personel->ad = $request->ad;
        $personel->soyad = $request->soyad;
        $personel->cinsiyet = $request->cinsiyet;
        $personel->tcNo = $request->tcNo;
        $personel->telNo = $request->telNo;
        $personel->mail = $request->mail;
        $personel->evAdresi = $request->evAdresi;
        $personel->sifre = Hash::make($newPassword);
        $personel->apiToken = $apiToken;
        $personel->tip = 'Personel';
        $personel->yetki = json_encode([]);
        $personel->maas = json_encode([]);
        $personel->created_at = now();
        $personel->updated_at = now();
        $mailData = [
            "password" => $newPassword,
            "title" => "Peronelimiz {$request->ad} {$personel->soyad}",
            "body" => "Burası body alanı"
        ];
        $result = Mail::to('test@otomasyon.com')->send(new SendPasswordMail($mailData));
        if ($result){
            return $personel->save()
                ?
                $this->apiResponse(ResultType::Success, $personel, 'Kullanıcı başarıyla eklendi!', 201)
                :
                $this->apiResponse(ResultType::Error, null, 'Personel eklenme sırasında hata oluştu!', 404);

        }
        else
            return $this->apiResponse(ResultType::Error, null, 'Personel eklenme sırasında hata oluştu!', 404);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Personel $personel
     * @return Personel
     */
    public function show(Personel $personel)
    {
        return $personel;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Personel $personel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personel $personel)
    {
        if (Hash::check($request->sifre, $personel->sifre)) {

            $personel->update($request->except('sifre'));

            return $this->apiResponse(ResultType::Success, $personel, 'Kullanıcı başarıyla güncellendi!', 200);
        } else
            return $this->apiResponse(ResultType::Error, null, 'Girilen şifre eşleşmemektedir!', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Personel $personel
     * @return bool
     */
    public function destroy(Personel $personel)
    {
        return $personel->delete();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function personelChangePassword(ChangePasswordRequest $request, $id)
    {


        $ogrenci = Personel::find($request->id);

        if (Hash::check($request->password, $ogrenci->sifre)) {

            $ogrenci->sifre = Hash::make($request->newPassword);
            $ogrenci->save();

            return $this->apiResponse(ResultType::Success, $ogrenci, 'Kullanıcı şifresi başarıyla güncellendi!', 200);
        } else
            return $this->apiResponse(ResultType::Error, null, 'Girilen şifre eşleşmemektedir!', 200);
    }
}
