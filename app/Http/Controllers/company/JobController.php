<?php

namespace App\Http\Controllers\company;

use App\Models\Job;
use App\Models\Company;
use App\Models\JobCategory;
use App\Models\JobTimeType;
use App\Models\requirement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
        $requirements = requirement::all();

        $data = ([
            "title" => "Tambah Lowongan Pekerjaan",
            "jobtimtypes" => $jobtimtypes,
            "jobcategories" => $jobcategories,
            "requirements" => $requirements
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Job::findOrFail($id);
        $requirements = Requirement::all();
        $selectedRequirements = $job->pluck('id')->toArray(); // Assume the project has a many-to-many relationship with requirements
        $jobcategories = JobCategory::all();
        $jobtimtypes = JobTimeType::all();

        $data = ([
            "title" => "Edit Data Lowongan Kerja",
            "job" => $job,
            "requirements" => $requirements,
            "selectedRequirements" => $selectedRequirements,
            "jobcategories" => $jobcategories,
            "jobtimtypes" => $jobtimtypes
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
        ]);
        try {
            $job = Job::findOrFail($id);
            job::create();
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
}
