<?php

namespace App\Http\Controllers;

use App\Models\job_category;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    //
    public function index()
    {
        $categories = job_category::all();
        $data = ([
            "title" => "Job Category",
            "categories" => $categories
        ]);

        return view('job-seekers.index', $data);
    }
}
