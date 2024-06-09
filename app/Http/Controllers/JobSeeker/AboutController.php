<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobTimeType;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // $jobCategoryId = Request()->input("job_category_id");
        // $job_category = JobCategory::all();
        // $job_time = JobTimeType::all();
        // $jobEloquent = Job::with('jobTime', 'company', 'jobcategory');
        // if ($jobCategoryId) {
        //     $jobEloquent->where("job_category_id", $jobCategoryId);
        // }
        // $jobs = $jobEloquent->paginate(10);
        // $totalJob = $jobEloquent->count();

        // $data = ([
        //     "job_category" => $job_category,
        //     "job_time" => $job_time,
        //     "jobs" => $jobs,
        //     "totalJob" => $totalJob,
        //     'jobCategoryId' => $jobCategoryId

        // ]);

        return view('job-seekers.about');


    }
}