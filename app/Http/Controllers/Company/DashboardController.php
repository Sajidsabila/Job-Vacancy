<?php

namespace App\Http\Controllers\Company;

use App\Models\Job;
use App\Models\Company;
use App\Models\JobHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $company = Company::where('id', $user->id)->first();
        $job= Job::with('company')->where('company_id', $user->id)->count();
        $job_histories= JobHistory::with('company')->where('id', $user->id)->count();
        $data = ([
            "title" => "Profile Perusahaan",
            "company" => $company,
            "job" => $job,
            "job_histories" => $job_histories
        ]);
        //dd($company);
        if (!$company) {
            return view('company.profil-company.form');
        }
        return view('company.profil-company.index', $data);
    }

    public function store(Request $request)
    {

    }
}
