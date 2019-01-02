<?php

namespace App\Http\Requests\Home;

use App\Http\Requests\Request;

class LoginRequest extends Request
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
            'mobile'    => 'required',
            'password'  => 'required'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return  [
            'mobile.required'   => '请输入手机号',
            'password.required' => '请输入密码',
        ];
    }

}
