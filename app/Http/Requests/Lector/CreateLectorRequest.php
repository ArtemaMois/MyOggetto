<?php

namespace App\Http\Requests\Lector;

use Illuminate\Foundation\Http\FormRequest;

class CreateLectorRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'exists:users,email'],
            'theme_id' => ['required', 'exists:themes,id'],
            'description' => ['string', 'min:10', 'max:100'],
            'is_active' => ['boolean']
        ];
    }
}
