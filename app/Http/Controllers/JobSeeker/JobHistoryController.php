<?php

namespace App\Http\Controllers\JobSeeker;

use App\Models\JobSeeker;
use App\Models\JobHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Configuration;
use Illuminate\Support\Facades\Auth;

class JobHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $configurations = Configuration::first();

        $jobhistories = JobHistory::with(['jobseeker', 'job'])->where('job_seeker_id', $user->id)->paginate(1);

        $data = ([
            "title" => "Data History Lamaran",
            "jobhistories" => $jobhistories,
            "configurations" => $configurations
        ]);

        return view("job-seekers.job-history", $data);
    }
}