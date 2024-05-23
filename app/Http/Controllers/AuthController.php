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
            // Define more custom messages here
        ];

        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], $messages);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect("/");
        }
        return back()->with("errorMessage", "Gagal login, email atau password tidak ditemukan");

    }
}
