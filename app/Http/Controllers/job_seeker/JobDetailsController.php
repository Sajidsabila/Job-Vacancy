<?php

namespace App\Http\Controllers\job_seeker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobDetailsController extends Controller
{

    public function navigateToJob()
    {
        $this->redirect('/job');
    }

    public function index()
    {
        return view('job-seekers.job-details');
    }
}
