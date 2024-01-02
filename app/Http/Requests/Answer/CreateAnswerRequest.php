<?php

namespace App\Http\Requests\Answer;

use Illuminate\Foundation\Http\FormRequest;

class CreateAnswerRequest extends FormRequest
{

    public function rules()
    {
        return [
            'body' => ['required', 'string', 'max:500'],
        ];
    }
}
