<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function index()
    {
        $data = [
            "title" => "Login",
        ];
        return view('login-page.index', $data);
    }

    public function login(Request $request)
    {
        $messages = [
            'email.required' => 'Masukkan Email Terlebih Dahulu',
            'password.required' => 'Masukkan Password Dengan Benar',
        ];

        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], $messages);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role !== 'Admin' && is_null($user->email_verified_at)) {
                Auth::logout();
                return back()->with('errorMessage', 'Akun belum terverifikasi.');
            }

            switch ($user->role) {
                case 'Admin':
                    return redirect()->route('admin.dashboard');
                case 'Superadmin':
                    return redirect()->route('superadmin.dashboard');
                case 'Company':
                    return redirect()->route('companie.dashboard');
                default:
                    return redirect('/');
            }
        }

        return back()->with('errorMessage', 'Gagal login, email atau password tidak ditemukan');
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }

    // public function redirect()
    // {
    //     return Socialite::driver('google')->redirect();
    // }
    // public function callback()
    // {
    //     // Google user object dari google
    //     $userFromGoogle = Socialite::driver('google')->user();

    //     // Ambil user dari database berdasarkan google user id
    //     $userFromDatabase = User::where('google_id', $userFromGoogle->getId())->first();

    //     // Jika tidak ada user, maka buat user baru
    //     if (!$userFromDatabase) {
    //         $newUser = new User([
    //             'google_id' => $userFromGoogle->getId(),
    //             'name' => $userFromGoogle->getName(),
    //             'email' => $userFromGoogle->getEmail(),
    //         ]);

    //         $newUser->save();

    //         // Login user yang baru dibuat
    //         auth('web')->login($newUser);
    //         session()->regenerate();

    //         return redirect('/');
    //     }

    //     // Jika ada user langsung login saja
    //     auth('web')->login($userFromDatabase);
    //     session()->regenerate();

    //     return redirect('/');
    // }
    public function landing()
    {
        return view('landing-page.index');
    }
}