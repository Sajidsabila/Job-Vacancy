<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\CustomVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function Register(Request $request)
    {
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
            'role' => 'User',
            'email_verification_token' => $verificationToken,
        ]);

        // Send verification email
        Mail::to($user->email)->send(new CustomVerifyEmail($user));

        event(new Registered($user));
        return back()->with("success", "Registrasi Berhasil Silahkan Cek Email Untuk Verifikasi");
    }

    public function verifyEmail($token)
    {
        // Cari user berdasarkan token
        $user = User::where('email_verification_token', $token)->first();

        // Jika user tidak ditemukan
        if (!$user) {
            return redirect()->route('login')->with('error', 'Token verifikasi tidak valid.');
        }

        // Jika email sudah diverifikasi sebelumnya
        if ($user->email_verified_at !== null) {
            return redirect()->route('login')->with('error', 'Email sudah diverifikasi sebelumnya.');
        }

        // Verifikasi email dan update waktu verifikasi
        $user->email_verified_at = Carbon::now();
        $user->email_verification_token = null;
        $user->save();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Email berhasil diverifikasi. Silahkan login.');
    }

}