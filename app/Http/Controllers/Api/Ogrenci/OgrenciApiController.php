<?php

namespace App\Http\Controllers\Api\Ogrenci;

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ResultType;
use App\Http\Requests\Api\General\ChangePasswordRequest;
use App\Http\Requests\Api\Ogrenci\OgrenciStoreRequest;
use App\Models\Ogrenci;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OgrenciApiController extends ApiController
{
    /**
     * @return Ogrenci[]|\Illuminate\Database\Eloquent\Collection
     *
     * @OA\Get (
     *     path="/api/ogrenci",
     *     tags={"ogrenci"},
     *     summary="Bütün öğrencileri listeler",
     *  @OA\Response(
     *      response=200,
     *      description="Açıklama yok"
     *  )
     * )
     */
    public function index()
    {
        return Ogrenci::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OgrenciStoreRequest $request)
    {

    }

    /**
     * @param Ogrenci $ogrenci
     * @return Ogrenci
     */
    public function show(Ogrenci $ogrenci)
    {
        return $ogrenci;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Ogrenci $ogrenci
     * @return array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function update(Request $request, Ogrenci $ogrenci)
    {

        if (Hash::check($request->sifre, $ogrenci->sifre)) {

            $ogrenci->update($request->except('sifre'));

            return $this->apiResponse(ResultType::Success, $ogrenci, 'Kullanıcı başarıyla güncellendi!', 200);
        } else
            return $this->apiResponse(ResultType::Error, null, 'Girilen şifre eşleşmemektedir!', 404);

    }

    /**
     * @param Ogrenci $ogrenci
     * @return bool|null
     * @throws \Exception
     */
    public function destroy(Ogrenci $ogrenci)
    {
        return $ogrenci->delete();
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function studentChangePassword(ChangePasswordRequest $request, $id)
    {

        $ogrenci = Ogrenci::find($request->id);

        if (Hash::check($request->password, $ogrenci->sifre)) {

            $ogrenci->sifre = Hash::make($request->newPassword);
            $ogrenci->save();

            return $this->apiResponse(ResultType::Success, $ogrenci, 'Kullanıcı şifresi başarıyla güncellendi!', 200);
        } else
            return $this->apiResponse(ResultType::Error, null, 'Girilen şifre eşleşmemektedir!', 200);
    }
}
