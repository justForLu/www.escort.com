<?php

namespace App\Http\Requests\Home;

use App\Http\Requests\Request;

class RegisterRequest extends Request
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
            'mobile' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return  [

        ];
    }

}
