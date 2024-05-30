<?php

namespace App\Http\Controllers\job_seeker;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobTimeType;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index()
    {
        $job_category = JobCategory::all();
        $job_time = JobTimeType::all();
        $jobs = Job::paginate(10);
        $totalJob = Job::count();
        $data = ([
            "job_category" => $job_category,
            "job_time" => $job_time,
            "jobs" => $jobs,
            "totalJob" => $totalJob

        ]);
        $jobs = Job::with('company')->get();
        return view('job-seekers.job-listing', $data);


    }
}