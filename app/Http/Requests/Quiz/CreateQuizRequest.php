<?php

namespace App\Http\Requests\Quiz;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuizRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:20'],
            'body' => ['required', 'string', 'min:10', 'max:200']
        ];
    }
}
