<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateAccountRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100', 'unique:users,email'],
            'password' => ['required'],
            'profile_id' => ['required', 'integer', 'exists:profiles,id'],
            'is_active' => ['required', 'integer'],
            'theme_id' => ['nullable', 'integer', 'exists:themes,id'],
            'description' => ['nullable' ,'string', 'max:300']
        ];
    }
}
