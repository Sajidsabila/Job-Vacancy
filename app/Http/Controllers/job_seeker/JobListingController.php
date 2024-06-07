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
        $jobCategoryId = Request()->input("job_category_id");
        $jobTimeType = Request()->input("job_time_type_id");
        $rangeStart = Request()->input("range_start");
        $rangeEnd = Request()->input("range_end");
        $job_category = JobCategory::all();
        $job_time = JobTimeType::all();
        $jobEloquent = Job::with('jobTime', 'company', 'jobcategory');
        if ($jobCategoryId) {
            $jobEloquent->where("job_category_id", $jobCategoryId);
        } else if ($jobTimeType) {
            $jobEloquent->where("job_time_type_id", $jobTimeType);
        } else if ($rangeStart && $rangeEnd) {
            $jobEloquent->whereBetween('salary', $rangeStart, $rangeEnd);
        }
        $jobs = $jobEloquent->paginate(10);
        $totalJob = $jobEloquent->count();

        $data = ([
            "job_category" => $job_category,
            "job_time" => $job_time,
            "jobs" => $jobs,
            "totalJob" => $totalJob,
            'jobCategoryId' => $jobCategoryId,
            "jobTimeType" => $jobTimeType,
            "rangeStart" => $rangeStart,
            "rangeEnd" => $rangeEnd

        ]);

        return view('job-seekers.job-listing', $data);


    }

    public function showJobsByCategory($id)
    {
        $categories = JobCategory::findOrFail($id);

        $jobs = Job::where('job_category_id', $id)->get();
        $jobCategoryId = Request()->input("job_category_id");
        $job_category = JobCategory::all();
        $job_time = JobTimeType::all();

        $jobTimeType = Request()->input("job_time_type_id");
        $totalJob = $jobs->count();

        // $job = Job::findOrFail($id);

        // $company = $jobs[0]->company; // Mendapatkan informasi perusahaan terkait
        // $logoUrl = null;

        // if ($company && $company->logo) {
        //     $logoUrl = asset('storage/' . $company->logo);
        // }
        $data = ([
            "job_category" => $job_category,
            "job_time" => $job_time,
            "categories" => $categories,
            "jobs" => $jobs,
            "totalJob" => $totalJob,
            "jobCategoryId" => $jobCategoryId,
            "jobTimeType" => $jobTimeType,

        ]);
        return view('job-seekers.job-listing', $data);
    }

}