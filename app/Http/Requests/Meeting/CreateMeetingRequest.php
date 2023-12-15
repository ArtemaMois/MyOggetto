<?php

namespace App\Http\Requests\Meeting;

use App\Models\Meeting;
use Illuminate\Foundation\Http\FormRequest;

class CreateMeetingRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => ['string', 'max:100', 'min:3'],
            'description' => ['string', 'min:5', 'max:250'],
            'date' =>['required', 'date'],
            'lector_id' => ['integer','nullable', 'exists:lectors,id'],
            'theme_id' => ['integer', 'nullable', 'exists:themes,id']
        ];
    }
}
