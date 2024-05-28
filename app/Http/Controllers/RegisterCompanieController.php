<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        try {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'Company'
            ]);

            event(new Registered($user));
            return back()->with("success", "Registrasi Berhasi Silahkan Login");
        } catch (\Throwable $th) {
            //throw $th;
        }

    }
}
