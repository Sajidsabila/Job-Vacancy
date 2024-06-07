<?php

namespace App\Http\Controllers\JobSeeker;

use App\Models\JobSeeker;
use App\Models\JobHistory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JobHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $jobhistories = JobHistory::with(['jobseeker', 'job'])->where('job_seeker_id', $user->id)->get();

        $data = ([
            "title" => "Data History Lamaran",
            "jobhistories" => $jobhistories
        ]);

        return view("job-seekers.job-history", $data);
    }
}
