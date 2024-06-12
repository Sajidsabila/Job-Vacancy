<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\CustomVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterCompanieController extends Controller
{
    public function index()
    {
        return view('register.companie');
    }

    public function Register(Request $request)
    {
        $user = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ]);
        $verificationToken = Str::random(mt_rand(4, 5));

        // Create the user with email verification token
        $user = User::create([
            'email' => $user['email'],
            'password' => Hash::make($user['password']),
            'role' => 'Company',
            'email_verification_token' => $verificationToken,
        ]);

        // Send verification email
        Mail::to($user->email)->send(new CustomVerifyEmail($user));

        event(new Registered($user));
        return back()->with("success", "Registrasi Berhasil Silahkan Cek Email Untuk Verifikasi");
    }
}
