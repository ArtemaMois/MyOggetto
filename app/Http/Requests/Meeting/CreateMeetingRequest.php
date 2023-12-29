<?php

namespace App\Http\Requests\Meeting;

use App\Models\Meeting;
use Illuminate\Foundation\Http\FormRequest;

class CreateMeetingRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => [ 'required', 'string', 'max:100'],
            'description' => ['required', 'string', 'max:300'],
            'date' =>['required', 'date'],
            'theme_id' => ['required' ,'integer', 'exists:themes,id'],
            'uploads' => ['array', 'max:5'],
            'uploads.*' => ['max:20480']
        ];
    }
}
