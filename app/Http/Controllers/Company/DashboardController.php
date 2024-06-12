<?php

namespace App\Http\Controllers\Company;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobHistory;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $jobCount = Job::count();
        $jobHistoryCount = JobHistory::count();
        $user = Auth::user();
        $company = Company::where('id', $user->id)->first();
        $data = ([
            "title" => "Profile Perusahaan",
            "company" => $company,
            'jobCount' => $jobCount,
            'jobHistoryCount' => $jobHistoryCount
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