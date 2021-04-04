<?php

namespace App\Http\Requests\Api\Ogrenci;


use App\Http\Requests\Base\BaseRequest;

class OgrenciStoreRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kurumId' => 'required',
            'ad' => 'required',
            'soyad' => 'required',
            'mail' => 'required|email',
            'cinsiyet' => 'required',
            'tcNo' => 'required',
            'telNo' => 'required',
            'evAdresi' => 'required',
            'odaNo' => 'required',
            'katNo' => 'required',
            'yatakNo' => 'required',
            'foto' => 'required'
        ];
    }
}
