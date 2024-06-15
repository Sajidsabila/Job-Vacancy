<?php

namespace App\Http\Controllers\Company;

use App\Models\Benefit;
use Exception;
use App\Models\Job;
use App\Models\Skill;
use App\Models\Company;
use App\Models\education;
use App\Models\JobSeeker;
use App\Models\JobHistory;
use App\Models\JobCategory;
use App\Models\JobTimeType;
use App\Models\requirement;
use Illuminate\Http\Request;
use App\Models\WorkExperience;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\job_seeker\WorkExperienceController;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $company = Company::where('id', $user->id)->first();
        $jobs = [];

        if ($company) {
            $jobs = Job::with("company")->where('company_id', $company->id)->get();
        }
        //  dd($jobs[0]->company);
        $data = [
            "title" => "List Lowongan Kerja",
            "jobs" => $jobs
        ];

        return view("company.job.index", $data);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $company = Company::where('id', $user->id)->first();
        $jobtimtypes = JobTimeType::all();
        $jobcategories = JobCategory::all();
        $requirements = Requirement::all();
        $benefits = Benefit::all();
        $selectedRequirements = [];
        $selectedBenefits = [];
        $data = ([
            "title" => "Tambah Lowongan Pekerjaan",
            "jobtimtypes" => $jobtimtypes,
            "jobcategories" => $jobcategories,
            "requirements" => $requirements,
            "selectedRequirements" => $selectedRequirements,
            "benefits" => $benefits,
            "selectedBenefits" => $selectedBenefits

        ]);
        if (!$company) {
            Alert::warning("Maaf", "Untuk Input Lowongan Kerja, Masukkan Data Perusahaan Terlebih Dahulu");
            return back();
        }
        return view("company.job.form", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "job_category_id" => "required",
            "job_time_type_id" => "required",
            "title" => "required",
            "description" => "required",
            "salary" => "required",
            "job_location" => "required",
            'requirement_id' => 'required|array',
            'requirement_id.*' => 'exists:requirements,id',
            'benefit_id' => 'required|array',
            'benefit_id.*' => 'exists:benefits,id',
        ]);

        try {
            // Menambahkan company_id dari user yang sedang login
            $data['company_id'] = auth()->user()->id;

            $job = Job::create($data);
            Alert::success("Sukses", "Upload Lowongan Berhasil");
            return redirect("/companie/lowongan-kerja");
        } catch (\Throwable $th) {
            // Menampilkan pesan error dan kembali ke halaman sebelumnya
            Alert::error("Gagal", $th->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $job = Job::with('jobcategory')->findOrFail($id);
        $filterstatus = Request()->input("statusFilter");
        // Get all job histories related to the job, optionally filtering by status
        $query = JobHistory::with(['jobseeker', 'job'])->where('job_id', $job->id);
        if ($filterstatus) {
            // Get all job histories related to the job, optionally filtering by status
            $query = JobHistory::with(['jobseeker', 'job'])->where('job_id', $job->id);
            if ($filterstatus) {
                $query->where('statusFilter', $filterstatus);
            }
            $jobhistoris = $query->get();

            // Calculate counts based on the retrieved job histories
            $countreject = $jobhistoris->filter(function ($jobhistory) {
                return $jobhistory->status == 'Lamaran Ditolak';
            })->count();

            $countaccept = $jobhistoris->filter(function ($jobhistory) {
                return $jobhistory->status == 'Lamaran Diterima';
            })->count();

            $countinterview = $jobhistoris->filter(function ($jobhistory) {
                return $jobhistory->status == 'Proses Interview';
            })->count();
            $statuses = JobHistory::select('status')->distinct()->get();
            $data = ([
                "title" => "Detail Data Lowongan",
                "job" => $job,
                "jobhistoris" => $jobhistoris,
                "countreject" => $countreject,
                "countaccept" => $countaccept,
                "countinterview" => $countinterview,
                "statuses" => $statuses,
                "selectedStatus" => $filterstatus

            ]);

            return view("company.job.detail", $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::findOrFail($id);
        $requirements = Requirement::all();
        $benefits = Benefit::all();
        $jobcategories = JobCategory::all();
        $selectedRequirements = is_string($job->requirement_id) ? json_decode($job->requirement_id, true) : $job->requirement_id;
        $selectedRequirements = is_array($selectedRequirements) ? $selectedRequirements : [];
        $selectedBenefits = is_string($job->benefit_id) ? json_decode($job->benefit_id, true) : $job->benefit_id;
        $selectedBenefits = is_array($selectedBenefits) ? $selectedBenefits : [];
        $jobtimtypes = JobTimeType::all();

        $data = ([
            "title" => "Edit Data Lowongan Kerja",
            "job" => $job,
            "requirements" => $requirements,
            "jobcategories" => $jobcategories,
            "jobtimtypes" => $jobtimtypes,
            "selectedRequirements" => $selectedRequirements,
            "benefits" => $benefits,
            "selectedBenefits" => $selectedBenefits,


        ]);
        return view('company.job.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            "job_category_id" => "required",
            "job_time_type_id" => "required",
            "title" => "required",
            "description" => "required",
            "salary" => "required",
            "job_location" => "required",
            'requirement_id' => 'required|array',
            'requirement_id.*' => 'exists:requirements,id',
            'benefit_id' => 'required|array',
            'benefit_id.*' => 'exists:benefits,id',
        ]);
        try {
            $job = Job::findOrFail($id);
            $job->update($data);
            Alert::success("Sukses", "Edit Data Sukses");
            return redirect("/companie/lowongan-kerja");
        } catch (\Throwable $th) {
            Alert::error("Error", $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $requirement = Requirement::find($id);
            $requirement->delete();
            Alert::success('Sukses', 'Delete data success.');
            return redirect("/companie/lowongan-kerja");
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return back();
        }
    }

    public function showJobSeeker($id)
    {

        $jobhistori = JobHistory::with('job', 'jobseeker')->where('id', $id)->find($id);


        $data = ([
            "jobhistori" => $jobhistori

        ]);
        return view("company.job.candidate-detail", $data);
    }
    public function viewPDF($id)
    {
        try {
            $jobhistori = JobHistory::findOrFail($id);
            $jobhistori->status = 'Lamaran Dilihat';
            $update = JobHistory::latest()->get();
            $jobhistori->save();
            return redirect()->to(asset('storage/' . $jobhistori->file));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    public function reject($id)
    {
        try {
            $jobhistori = JobHistory::findOrFail($id);
            $jobhistori->status = 'Lamaran Ditolak';
            $jobhistori->save();
            Alert::success("Berhasil", "status lamaran ditolak");
            return back();
        } catch (Exception $e) {

            Alert::error("Gagal", $e->getMessage());
            return back();
        }
    }
    public function accept($id)
    {
        try {
            $jobhistori = JobHistory::findOrFail($id);
            $jobhistori->status = 'Lamaran Diterima';
            $jobhistori->save();
            Alert::success("Berhasil", "status lamaran ditolak");
            return back();
        } catch (Exception $e) {

            Alert::error("Gagal", $e->getMessage());
            return back();
        }
    }
}
