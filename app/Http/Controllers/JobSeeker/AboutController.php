<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobTimeType;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        
      
        return view('job-seekers.about');


    }
}