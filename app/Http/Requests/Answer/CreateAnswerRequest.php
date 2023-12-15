<?php

namespace App\Http\Requests\Answer;

use Illuminate\Foundation\Http\FormRequest;

class CreateAnswerRequest extends FormRequest
{

    public function rules()
    {
        return [
            'body' => ['required', 'string', 'max:500'],
            'user_id' => ['required', 'exists:users,id'],
            'quiz_id' => ['required', 'exists:quizes,id']
        ];
    }
}
