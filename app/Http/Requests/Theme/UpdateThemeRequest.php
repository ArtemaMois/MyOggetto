<?php

namespace App\Http\Requests\Theme;

use Illuminate\Foundation\Http\FormRequest;

class UpdateThemeRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:1', 'max:100', 'unique:themes,name']
        ];
    }
}
