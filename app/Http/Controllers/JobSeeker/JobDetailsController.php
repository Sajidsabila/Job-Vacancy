<?php

namespace App\Http\Controllers\JobSeeker;

use App\Models\Benefit;
use App\Models\Job;
use App\Models\Company;
use App\Models\JobSeeker;
use App\Models\JobHistory;
use App\Models\JobCategory;
use App\Models\JobTimeType;
use App\Models\Requirement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\company\CompanyProfilController;
use App\Models\Configuration;

class JobDetailsController extends Controller
{
    public function navigateToJobList()
    {
        $this->redirect('/job-seekers/job-details');
    }

    public function index($id)
    {
        $job = Job::where('slug', $id)->firstOrFail();// Mendapatkan informasi perusahaan terkait
        $requirements = Requirement::all();
        $jobcategories = JobCategory::all();
        $job_time = JobTimeType::all();
        $configurations = Configuration::first();
        $selectedRequirements = is_string($job->requirement_id) ? json_decode($job->requirement_id, true) : $job->requirement_id;
        $selectedRequirements = is_array($selectedRequirements) ? $selectedRequirements : [];
        $selectedBenefits = is_string($job->benefit_id) ? json_decode($job->benefit_id, true) : $job->benefit_id;
        $selectedBenefits = is_array($selectedBenefits) ? $selectedBenefits : [];
        $benefits = Benefit::all();
        $data = ([
            "title" => "Data Lowongan Kerja",
            "job" => $job,
            "job_time" => $job_time,
            "requirements" => $requirements,
            "jobcategories" => $jobcategories,
            "selectedRequirements" => $selectedRequirements,
            "configurations" => $configurations,
            "benefits" => $benefits,
            "selectedBenefits" => $selectedBenefits
        ]);

        // dd($job);
        return view('job-seekers.job-details', $data);
        // return view('job-seekers.job-details');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $jobseeker = JobSeeker::where('id', $user->id)->exists();
        if ($jobseeker) {
            $data = $request->validate([
                'file' => 'required|file|mimes:pdf|max:2048',
                'job_id' => 'required|integer'
            ]);

            $check = JobHistory::where('job_seeker_id', auth()->user()->id)
                ->where('job_id', $request->job_id)
                ->exists();

            if ($check) {
                Alert::warning("Maaf", "Anda sudah melamar lowongan ini.")->flash();
                return back();
            }

            try {
                $path = $request->file('file')->store('file_lamaran/pdf', 'public');
                JobHistory::create([
                    'file' => $path,
                    'job_id' => $request->job_id,
                    'job_seeker_id' => auth()->user()->id
                ]);
                Alert::success("Berhasil", "Lamaran Berhasil Dikirim. Silahkan Dicheck di Riwayat Lamaran");
                return back();
            } catch (\Throwable $th) {
                Alert::error("Error", $th->getMessage());
                return back();
            }
        } else {
            Alert::warning("Maaf", "Anda belum mengisi biodata. Mohon isi biodata terlebih dahulu untuk melamar.")->flash();
            return back();
        }
    }
}