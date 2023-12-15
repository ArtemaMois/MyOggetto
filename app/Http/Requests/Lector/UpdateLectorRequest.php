<?php

namespace App\Http\Requests\Lector;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLectorRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => ['string', 'min:2', 'max:20'],
            'email' => ['email'],
            'description' => ['string', 'min:10', 'max:100'],
            'theme_id' => ['exists:themes,id'],
            'is_active' => ['boolean']
        ];
    }
}
