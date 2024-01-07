<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PasswordResetRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordsController extends Controller
{
    public function create()
    {
        return view('auth.forgot-password');
    }

    public function sendResetMessage(PasswordResetRequest $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }
}
