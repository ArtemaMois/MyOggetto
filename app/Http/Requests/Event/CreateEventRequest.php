<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:30'],
            'description' => ['required', 'string', 'min:3', 'max:500'],
            'date' => ['required', 'date']
        ];
    }
}
