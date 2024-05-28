<?php

namespace App\Http\Controllers\company;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $company = Company::where('id', $user->id)->first();
        //cm data tunggal bukan collection
        $data = ([
            "title" => "Profile Perusahaan",
            "company" => $company
        ]);
        //dd($company);
        if (!$company) {
            return view('companie.profil-companie.form');
        }
        return view('companie.profil-companie.index', $data);
    }

    public function store(Request $request)
    {

    }
}
