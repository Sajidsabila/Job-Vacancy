<?php

namespace App\Http\Controllers\job_seeker;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    //
    public function index()
    {
        $categories = JobCategory::limit(8)->get();
        $data = ([
            "title" => "Job Category",
            "categories" => $categories
        ]);

        return view('job-seekers.index', $data);
    }
    public function getJobCategory()
    {
        $categories = JobCategory::limit(8)->get();
        $data = ([
            "title" => "Job Category",
            "categories" => $categories
        ]);

        return view('job-seekers.index', $data);
    }

    public function listJob()
    {
        $categories = JobCategory::all();
        $data = ([
            "title" => "All Job Categories",
            "categories" => $categories
        ]);

        return view('job-seekers.list-job', $data);
    }

}