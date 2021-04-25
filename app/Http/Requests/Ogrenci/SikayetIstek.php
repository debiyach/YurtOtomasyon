<?php

namespace App\Http\Requests\Ogrenci;

use Illuminate\Foundation\Http\FormRequest;

class SikayetIstek extends FormRequest
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
            'aciklama' => 'required|min:5',
            'tip' => 'required'
        ];
    }
}
