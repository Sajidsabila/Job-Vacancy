<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterCompanieController extends Controller
{
    public function index()
    {
        return view('register.companie');
    }
}