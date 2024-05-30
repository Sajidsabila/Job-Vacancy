<?php

namespace App\Http\Controllers\job_seeker;

use App\Http\Controllers\company\CompanyProfilController;
use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;

class JobDetailsController extends Controller
{
    public function navigateToJobList()
    {
        $this->redirect('/job-seekers/job-details');
    }

    public function index($id)
    {
        // $company = Company::all();
        // $job_category = JobCategory::all();
        // // $job_time = JobTimeType::all();
        // $jobs = Job::with('company')->findOrFail($id);
        // $jobs = Job::paginate(10);
        // $data = ([
        //     "job_category" => $job_category,
        //     // "job_time" => $job_time,
        //     "jobs" => $jobs,
        //     "company" => $company

        // ]);
        $job = Job::with('company')->findOrFail($id);
        $company = $job->company; // Mendapatkan informasi perusahaan terkait
        // dd($jobs);
        return view('job-seekers.job-details', compact('job', 'company'));
        // return view('job-seekers.job-details');
    }
}
