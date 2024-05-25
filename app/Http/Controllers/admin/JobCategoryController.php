<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\JobCategory;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = JobCategory::all();
        $data = ([
            "title" => "Job Category",
            "categories" => $categories
        ]);

        return view('super-admin.job category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('super-admin.job category.form');
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
            JobCategory::create($data);
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
        $jobcategory = JobCategory::find($id);
        $data = ([
            "title" => "Edit Data Perusahaan",
            "jobcategory" => $jobcategory
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
            JobCategory::create($data);
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
        //
    }
}
