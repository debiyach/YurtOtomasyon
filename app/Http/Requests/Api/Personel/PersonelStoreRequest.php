<?php

namespace App\Http\Requests\Api\Personel;

use App\Http\Requests\Base\BaseRequest;

class PersonelStoreRequest extends BaseRequest
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
            'ad'=>'required',
            'soyad'=>'required',
            'cinsiyet'=>'required',
            'tcNo'=>'required|size:11',
            'telNo'=>'required',
            'evAdresi'=>'required',
            'mail'=>'required|email',
        ];
    }
}
