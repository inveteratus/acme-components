<?php

namespace App\Http\Controllers\Acme;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerifyController extends Controller
{
    public function resend(Request $request): RedirectResponse
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }

    public function handler(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();

        return redirect(RouteServiceProvider::HOME);
    }
}
