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
        $data = ([
            'title' => 'Data Perusahaan Website',
            'configurations' => $configurations,
            'jobSeekerCount' => $jobSeekerCount,
            'companies' => $companies

        ]);
        return view('super-admin.dashboard.index', $data);
    }
}