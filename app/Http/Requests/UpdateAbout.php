<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAbout extends FormRequest
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
            'en_title' => 'required|min:5|max:100',
            'en_caption' => 'required|min:5',
            'ar_title' => 'required|min:5|max:100',
            'ar_caption' => 'required|min:5',
        ];
    }
}
