<?php

namespace App\Http\Controllers\job_seeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListJobController extends Controller
{
    public function index()
    {
        return view('job-seekers.job-listing');
    }
}
