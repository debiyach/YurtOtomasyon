<?php

namespace App\Http\Requests\Personel\OgrenciIslemleri;

use Illuminate\Foundation\Http\FormRequest;

class OgrenciEkle extends FormRequest
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
            'ad' => 'required|min:2',
            'soyad' => 'required|min:2',
            'email' => 'required|unique:App\Models\Ogrenci,mail',
            'telNo' => 'required|unique:App\Models\Ogrenci,telNo',
            'tcNo' => 'required|unique:App\Models\Ogrenci,tcNo',
            'adres' => 'required|min:2',
            'resim' => 'image|required|mimes:jpg,jpeg,png'
        ];
    }
}
