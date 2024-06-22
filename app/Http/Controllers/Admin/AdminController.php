<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Configuration;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\JobSeeker;
use Diglactic\Breadcrumbs\Breadcrumbs;

class AdminController extends Controller
{
    //
    public function index()
    {
        
        $jobSeekerCount = JobSeeker::count();
        $companies = Company::count();
        $configurations = Configuration::all();
        $totalCompanies = Company::count(); // Menghitung jumlah perusahaan

        $data = ([
            'title' => 'Data Perusahaan Website',
            'configurations' => $configurations,
            'jobSeekerCount' => $jobSeekerCount,
            'companies' => $companies,
            'totalCompanies' => $totalCompanies // Mengirim jumlah perusahaan ke view

        ]);
        return view('super-admin.dashboard.index', $data);
    }
}