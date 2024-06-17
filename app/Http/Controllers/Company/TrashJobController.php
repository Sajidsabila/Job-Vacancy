<?php

namespace App\Http\Controllers\Company;

use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TrashJobController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $company = Company::where('id', $user->id)->first();
        $jobs = [];

        if ($company) {
            $jobs = Job::with("company")->where('company_id', $company->id)->onlyTrashed()->get();
        }
        //  dd($jobs[0]->company);
        $data = [
            "title" => "List Lowongan Kerja",
            "jobs" => $jobs
        ];

        return view("company.job.trash-job", $data);
    }
}
