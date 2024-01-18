<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationsController extends Controller
{
    public function noticeForm()
    {
        return view('account.verify_email');
    }

    public function verifyAccount(EmailVerificationRequest $request)
    {
        $request->fulfill();
        if (auth()->user()->profile_id === 3) {
            return redirect()->route('meeting.index');
        }
        if (auth()->user()->profile_id === 2) {
            return redirect()->route('meeting.create');
        }
        if (auth()->user()->profile_id === 1) {
            return redirect()->route('event.create');
        }
    }
}
