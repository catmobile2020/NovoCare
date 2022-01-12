<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHomes extends FormRequest
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
            'image'         => 'nullable|image|mimes:jpeg,jpg,png|dimensions:width=375,height=302',
            'en_caption'    => 'required|min:5',
            'ar_caption'    => 'required|min:5'
        ];
    }
}
