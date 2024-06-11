<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'User'
        ]);

        event(new Registered($user));
        return back()->with("success", "Registrasi Berhasi Silahkan Login");
    }
}