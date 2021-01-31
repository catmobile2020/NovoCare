<?php


namespace App\Http\Requests\Api\V1\Contact;

use Dotenv\Exception\ValidationException;
use \Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreContactRequest extends FormRequest
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
            'name'      => 'required|min:5|max:255',
            'email'     => 'required|min:5|email',
            'comment'   => 'required|min:5'
        ];
    }

}
