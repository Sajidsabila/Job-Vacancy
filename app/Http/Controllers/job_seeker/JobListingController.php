<?php

namespace App\Http\Controllers\job_seeker;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\JobTimeType;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index()
    {
        $job_category=JobCategory::all();
        $job_time =JobTimeType::all();
        $data=([
            "job_category"=>$job_category,
            "job_time"=>$job_time
        ]);
        return view('job-seekers.job-listing',$data);


    }
}
