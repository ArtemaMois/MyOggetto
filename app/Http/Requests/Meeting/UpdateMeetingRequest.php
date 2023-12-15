<?php

namespace App\Http\Requests\Meeting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMeetingRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => ['string', 'max:100', 'min:3'],
            'description' => ['string', 'min:5', 'max:250'],
            'date' =>[ 'date'],
            'lector_id' => [ 'integer', 'exists:lectors,id'],
            'theme_id' => ['integer', 'exists:themes,id']
        ];
    }
}
