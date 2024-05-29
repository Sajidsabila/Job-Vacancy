<?php

namespace App\Http\Controllers\companie;

use App\Http\Controllers\Controller;

use App\Models\Job;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $jobs = Job::all();
        $data = ([
            "title" => "Lowongan Pekerjaan",
            "jobs" => $jobs
        ]);

        return view('company.lowongan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('company.lowongan.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            "icon" => "required",
            "category" => "required"
        ]);

        try {
            Job::create($data);
            Alert::success('Sukses', 'Add Data Berhasil success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return redirect('/admin/job-category');
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
        $Job = Job::find($id);
        $data = ([
            "title" => "Edit Data Perusahaan",
            "Job" => $Job
        ]);

        return view('super-admin.job category.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            "icon" => "required",
            "category" => "required"
        ]);

        try {
            Job::create($data);
            Alert::success('Sukses', 'Add Data Berhasil success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return redirect('/admin/job-category');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $job_category = Job::find($id);
            $job_category->delete();
            Alert::success('Sukses', 'Delete data success.');
            return redirect('religion');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect('/admin/job-category');
        }
    }
}
