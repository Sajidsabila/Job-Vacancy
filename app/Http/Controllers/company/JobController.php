<?php

namespace App\Http\Controllers\company;

use App\Models\Company;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\JobTimeType;
use Illuminate\Http\Request;
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
            "title" => "List job Kerja",
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

        $data = ([
            "title" => "Tambah job Pekerjaan",
            "jobtimtypes" => $jobtimtypes,
            "jobcategories" => $jobcategories
        ]);
        if (!$company) {
            Alert::warning("Maaf", "Untuk Input job Kerja, Masukkan Data Perusahaan Terlebih Dahulu");
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
            "deadline" => "required",
            "requirements" => "required"
        ]);

        try {
            $data['company_id'] = auth()->user()->id;
            Job::create($data);
            Alert::success("Sukses", "Upload job Berhasil");
            return view("/companie/job-kerja");
        } catch (\Throwable $th) {
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}