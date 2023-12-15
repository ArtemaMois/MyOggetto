<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentRequest extends FormRequest
{

    public function rules()
    {
        return [
            'body' => ['required', 'max:100'],
            'user_id' => ['exists:users,id'],
            'meeting_id' => ['exists:meetings,id']
        ];
    }
}
