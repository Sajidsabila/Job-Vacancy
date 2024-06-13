<?php

namespace App\Http\Controllers\JobSeeker;

use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\JobCategory;
use App\Models\JobTimeType;

use App\Models\Testimonial;
use App\Models\ApplyProcess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Configuration;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    public function index()
    {
        // $testimonials = Testimonial::orderby('id')->limit(2);
        $testimonials = Testimonial::all();
        $applyProcesses = ApplyProcess::all();
        $categories = JobCategory::limit(8)->get();
        $jobs = Job::all(); // Ambil semua pekerjaan, atau sesuaikan query jika diperlukan
        $jobs = Job::with('jobTime', 'company', 'jobcategory')->get();
        $configurations = Configuration::first();
        // Menghitung jumlah pekerjaan per kategori
        $jobCounts = Job::select('job_category_id', DB::raw('count(*) as total'))
            ->groupBy('job_category_id')
            ->pluck('total', 'job_category_id');

        $data = [
            "title" => "Job Category",
            "categories" => $categories,
            "jobs" => $jobs,
            "applyProcesses" => $applyProcesses,
            "jobCounts" => $jobCounts,
            "testimonials" => $testimonials,
            "configurations" => $configurations,

        ];
        return view('job-seekers.index', $data);
    }

    public function getJobCategory()
    {
        $categories = JobCategory::limit(8)->get();
        $data = [
            "title" => "Job Category",
            "categories" => $categories,
        ];

        return view('job-seekers.index', $data);
    }

    public function listJob()
    {
        $categories = JobCategory::all();
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

    public function jobDetails()
    {
        $categories = JobCategory::all();
        $jobs = Job::all(); // Ambil semua pekerjaan, atau sesuaikan query jika diperlukan
        $jobs = Job::with('jobTime', 'company')->get();
        $data = [
            "title" => "Job Category",
            "categories" => $categories,
            "jobs" => $jobs,
        ];

        return view('job-seekers.job-details', $data);
    }


    public function Testimoni()
    {
        $user = Auth::user();
        $jobseeker = JobSeeker::with('user')->where('id', $user->id)->first();
        $testimonials = Testimonial::limit(2)->get();

        // Mengirim data ke view
        return view('job-seekers.index', [
            'jobseeker' => $jobseeker,
            'testimonials' => $testimonials,
        ]);
    }

    public function jobSeekerIndex()
    {
        // $testimonials = Testimonial::all();
        $testimonials = Testimonial::limit(2)->get();
        return view('job-seeker.testimoni.index', compact('testimonials'));
    }

    public function search(Request $request)
    {
        $jobCategoryId = $request->input("job_category_id");
        $jobTimeType = $request->input("job_time_type_id");
        $job_category = JobCategory::all();
        $job_time = JobTimeType::all();
        $jobEloquent = Job::with('jobTime', 'company', 'jobcategory');
        if ($jobCategoryId) {
            $jobEloquent->where("job_category_id", $jobCategoryId);
        } elseif ($jobTimeType) {
            $jobEloquent->where("job_time_type_id", $jobTimeType);
        }
        $jobs = $jobEloquent->paginate(10);
        // $totalJob = $jobEloquent->count();

        $keyword = $request->input('keyword');
        $jobs = Job::where('title', 'LIKE', '%' . $keyword . '%')
            ->orWhere('description', 'LIKE', '%' . $keyword . '%')
            ->get();

        $data = [
            "job_category" => $job_category,
            "job_time" => $job_time,
            "jobs" => $jobs,
            "totalJob" => $jobs->count(),
            'jobCategoryId' => $jobCategoryId,
            "jobTimeType" => $jobTimeType,
        ];

        return view('job-seekers.job-listing', $data);
    }

}