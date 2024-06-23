<?php

namespace App\Http\Controllers\Admin;

use App\Charts\CompanyChart;
use App\Charts\JobSeekerChart;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobSeeker;
use App\Models\Configuration;

class AdminController extends Controller
{
    public function index(JobSeekerChart $jobSeekerChart, CompanyChart $companyChart)
    {
        $jobSeekerCount = JobSeeker::count();
        $totalCompanies = Company::count();
        $configurations = Configuration::all();

        $data = [
            'title' => 'Data Perusahaan Website',
            'configurations' => $configurations,
            'jobSeekerCount' => $jobSeekerCount,
            'totalCompanies' => $totalCompanies,
            'jobSeekerChart' => $jobSeekerChart->build(),
            'companyChart' => $companyChart->build()
        ];

        return view('super-admin.dashboard.index', $data);
    }
}
