<?php

namespace App\Http\Requests\Account;

use Illuminate\Console\View\Components\Confirm;
use Illuminate\Foundation\Http\FormRequest;

class CreateAccountRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required'],
        ];
    }
}


// 'password' => ['required', 'required_array_keys:value,confirmation'],
// 'password.value' => ['required', 'min:6', 'max:100'],
// 'password.confirmation' => ['required', 'min:6', 'max:100'],
