<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            $role = Auth::user()->role;
            switch ($role) {
                case 'Admin':
                    return redirect()->route('admin.dashboard');
                case 'Superadmin':
                    return redirect()->route('superadmin.dashboard');
                case 'Companie':
                    return redirect()->route('companie.dashboard');
                default:
                    return redirect()->route('home');
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
}