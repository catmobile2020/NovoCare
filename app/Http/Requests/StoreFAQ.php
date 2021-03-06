<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFAQ extends FormRequest
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
            'en_question' => 'required|min:5|max:100',
            'en_answer' => 'required|min:5',
            'ar_question' => 'required|min:5|max:100',
            'ar_answer' => 'required|min:5',
        ];
    }
}
