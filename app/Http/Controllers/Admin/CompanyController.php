<?php

namespace App\Http\Controllers\Admin;

use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        $data = ([
            "title" => "List Perusahaan",
            "companies" => $companies
        ]);

        return view("super-admin.listcompany.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $company = Company::findOrFail($id);
        $query = Job::with('company')->where('company_id', $company->id);
        $jobs = $query->get();
        $countjob = $query->count();
        $data = ([
            "title" => "Detail Company",
            "company" => $company,
            "jobs" => $jobs,
            "countjob" => $countjob
        ]);

        return view("super-admin.listcompany.detail", $data);
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
