<?php

namespace App\Traits;

use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

trait ResetsPasswords
{
    // Menampilkan form reset password
    public function showResetForm(Request $request, $token = null)
    {
        dd($token);
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    // Mengatur ulang password
    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
            'token' => 'required'
        ]);
        dd($request);
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = bcrypt($password);
                $user->save();
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }
}
