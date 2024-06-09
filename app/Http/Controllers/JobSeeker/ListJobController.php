<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListJobController extends Controller
{
    public function index()
    {
        $categories = JobCategory::with('jobs')->get();
        $jobs = Job::all(); // Ambil semua pekerjaan, atau sesuaikan query jika diperlukan

        // Menghitung jumlah pekerjaan per kategori
        $jobCounts = Job::select('job_category_id', DB::raw('count(*) as total'))
            ->groupBy('job_category_id')
            ->pluck('total', 'job_category_id');

        $data = [
            "title" => "Job Category",
            "categories" => $categories,
            "jobs" => $jobs,
            "jobCounts" => $jobCounts
        ];

        return view('job-seekers.list-job', $data);
    }
}
