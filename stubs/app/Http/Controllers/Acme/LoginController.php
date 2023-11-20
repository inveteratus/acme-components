<?php

namespace App\Http\Controllers\Acme;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
