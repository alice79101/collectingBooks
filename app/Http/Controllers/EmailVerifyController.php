<?php

namespace App\Http\Controllers;

use App\Events\UserEmailVerified;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class EmailVerifyController extends Controller
{
    public function create()
    {
        return "U have to verify ur email";
    }

    public function store(EmailVerificationRequest $request)
    {
//        dd($request->user());  //先看一下有什麼
        $request->fulfill();
        // 觸發歡迎信
//        event(new UserEmailVerified($request->user()));
        return "email verify successful";
    }

    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return 'Verification link sent!';
    }
}
