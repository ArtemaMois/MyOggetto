<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => ['string', 'max:60'],
            'email' => ['unique:users,email'],
            'password' => ['min:6'],
            'profile_id' => ['exists:profile,id']
        ];
    }
}
