<?php

namespace App\Http\Controllers\companie;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $company = Company::where('id', $user->id)->get();
        $data = ([
            "title" => "Profile Perusahaan",
            "company" => $company
        ]);
        if ($company->isEmpty()) {
            return view('companie.profil-companie.form');
        }
        return view('companie.profil-companie.index', $data);
    }

    public function store(Request $request)
    {

    }
}
