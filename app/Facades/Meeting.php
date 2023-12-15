<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Meeting extends Facade
{

    /**
     * @method static \App\Models\User searchFollowers(
     *

     * @see \App\Services\AccountService
     */
    protected static function getFacadeAccessor(): string
    {
        return "meeting_service";
    }
}
