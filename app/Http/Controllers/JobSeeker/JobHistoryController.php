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
    public function index(Request $request)
    {
        $user = Auth::user();
        $configurations = Configuration::first();
        $query = JobHistory::with(['jobseeker', 'job'])->where('job_seeker_id', $user->id);
        $statuses = JobHistory::select('status')->distinct()->get();

        $historycount = $query->count();
        $countviewed = $query->where('status', 'Lamaran Dilihat')->count();
        $countreject = $query->where('status', 'Lamaran Ditolak')->count();
        $countinterview = $query->where('status', 'Proses Interview')->count();
        $countaccept = $query->where('status', 'Lamaran Diterima')->count();
        $filterstatus = $request->input('statusFilter');
        if ($filterstatus) {
            $query->where('status', $filterstatus);
        }

        // Mendapatkan data job histories dengan pagination
        $jobhistories = $query->paginate(5);
        $data = ([
            "title" => "Data History Lamaran",
            "jobhistories" => $jobhistories,
            "configurations" => $configurations,
            "historycount" => $historycount,
            'countviewed' => $countviewed,
            'countreject' => $countreject,
            'countinterview' => $countinterview,
            'countaccept' => $countaccept,
            "selectedStatus" => $filterstatus,
            "statuses" => $statuses,
        ]);

        return view("job-seekers.job-history", $data);
    }
}