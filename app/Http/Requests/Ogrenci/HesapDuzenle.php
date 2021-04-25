<?php

namespace App\Http\Requests\Ogrenci;

use Illuminate\Foundation\Http\FormRequest;

class HesapDuzenle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return session()->has('ogrenci');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mail' => 'required|email',
            'telNo' => 'required',
            'evAdresi' => 'required|min:3',
            'sifre' => 'required'
        ];
    }
}
