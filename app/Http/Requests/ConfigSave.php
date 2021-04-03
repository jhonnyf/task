<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ConfigSave extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        $rules = [
            'email'      => 'required|email',
            'first_name' => 'required|string',
        ];

        if (isset($request->password)) {
            $rules['password']              = 'required|min:6|confirmed';
            $rules['password_confirmation'] = 'required|min:6';
        }

        return $rules;
    }
}
