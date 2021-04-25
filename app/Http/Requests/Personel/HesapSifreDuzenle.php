<?php

namespace App\Http\Requests\Personel;

use Illuminate\Foundation\Http\FormRequest;

class HesapSifreDuzenle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return session()->has('personel');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sifre' => 'required|min:4',
            'yeniSifre' => 'required|min:4',
            'yeniSifreTekrar' => 'required|min:4'
        ];
    }
}
