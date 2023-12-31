<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class SearchUsersRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => ['string', 'nullable']
        ];
    }
}
