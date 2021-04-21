<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name'            => 'required',
            'email'                 => 'required|email:rfc,dns',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ];
    }
}
