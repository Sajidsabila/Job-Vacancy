<?php

namespace App\Http\Controllers\Company;

use App\Models\Job;
use App\Models\Company;
use App\Models\JobHistory;
use Illuminate\Http\Request;
use App\Charts\JobHistoryChart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    protected $jobHistoryChart;
    protected $companyChart;

    public function __construct(JobHistoryChart $jobHistoryChart)
    {
        $this->jobHistoryChart = $jobHistoryChart;
        
    }

    public function index()
    {
        $jobCount = Job::count();
        $jobHistoryCount = JobHistory::count();
        $user = Auth::user();
        $job = Job::with('company')->where('company_id', $user->id)->count();
        $job_histories = JobHistory::join('jobs', 'job_histories.job_id', 'jobs.id')
            ->where('company_id', $user->id)
            ->count();
        $company = Company::where('id', $user->id)->first();
        $data = [
            "title" => "Profile Perusahaan",
            "company" => $company,
            'jobCount' => $jobCount,
            'jobHistoryCount' => $jobHistoryCount,
            'job' => $job,
            'job_histories' => $job_histories,
            'jobhistoryChart' => $this->jobHistoryChart->build(),
            // 'companyChart' => $this->companyChart->build()
        ];

        if (!$company) {
            return view('company.profil-company.form');
        } else if ($company->status == 'Submission') {
            return view('company.profil-company.waiting-approval', $data);
        } else if ($company->status == 'Reject') {
            return view('company.profil-company.reject', $data);
        }
        return view('company.profil-company.index', $data);
    }

    public function sendSubmission()
    {
        try {
            $user = Auth::user();
            $company = Company::where('id', $user->id)->firstOrFail(); // Pastikan kolom user_id ada di tabel companies
            $company->status = "Submission";
            $company->save();
            Alert::success("Berhasil", "Pengajuan Ulang Berhasil");
            return back();
        } catch (\Throwable $th) {
            Alert::error("Gagal", $th->getMessage());
            return back();
        }
    }
}
