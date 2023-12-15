<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{

    public function rules()
    {
        return [
            'title' => ['string', 'min:3', 'max:30'],
            'description' => ['string', 'min:5', 'max:500'],
            'date' => ['date']
        ];
    }
}
