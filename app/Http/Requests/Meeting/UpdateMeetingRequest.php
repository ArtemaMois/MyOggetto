<?php

namespace App\Http\Requests\Meeting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMeetingRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => ['string', 'max:100'],
            'description' => ['string', 'max:300'],
            'date' =>['date'],
            'theme_id' => ['exists:themes,id'],
            'uploads' => ['array', 'max:5'],
            'uploads.*' => ['file', 'max:20480']
        ];
    }
}
