<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobSeeker;
use Illuminate\Http\Request;

class JobSeekerController extends Controller
{
    public function index()
    {
        $jobseeker = JobSeeker::all();
        $data = ([
            "title" => "Job Seeker",
            "jobseeker" => $jobseeker,
        ]);

        return view("super-admin.job-seeker.index", $data);
    }
}
