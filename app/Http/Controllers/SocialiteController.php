<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;  // Tambahkan ini
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomVerifyEmail;
use Illuminate\Auth\Events\Registered;

class SocialiteController extends Controller
{
    public function redirect(Request $request)
    {
        // Simpan peran dalam session sebelum redirect ke Google
        $role = $request->input('role');
        session(['role' => $role]);

        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        // Ambil objek user dari Google
        $userFromGoogle = Socialite::driver('google')->stateless()->user();

        // Ambil user dari database berdasarkan email dari Google
        $userFromDatabase = User::where('email', $userFromGoogle->getEmail())->first();

        // Jika tidak ada user, buat user baru
        if (!$userFromDatabase) {
            $role = session('role', 'User'); // Default role jika tidak ada dalam session
            $verificationToken = Str::random(mt_rand(4, 5));

            $newUser = new User([
                'email' => $userFromGoogle->getEmail(),
                'password' => Hash::make('1'),
                'role' => $role,
                'email_verification_token' => $verificationToken,
            ]);

            $newUser->save();

            // Kirim email verifikasi
            Mail::to($newUser->email)->send(new CustomVerifyEmail($newUser));
            event(new Registered($newUser));

            // Login user yang baru dibuat
            Auth::login($newUser);
            session()->regenerate();

            return $this->redirectToDashboard($role);
        }

        // Jika user sudah ada, langsung login
        Auth::login($userFromDatabase);
        request()->session()->regenerate();

        return $this->redirectToDashboard($userFromDatabase->role);
    }

    private function redirectToDashboard($role)
    {
        switch ($role) {
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}