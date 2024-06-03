<?php

namespace App\Http\Controllers\job_seeker;

use App\Models\JobSeeker;
use App\Models\WorkExperience;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $jobseeker = JobSeeker::where('id', $user->id)->first();
        $workexperience = WorkExperience::where('job_seeker_id', $jobseeker->id)->get();
        $data = ([
            "title" => "Profile User",
            "workexperience" => $workexperience,
            "jobseeker" => $jobseeker
        ]);
        if (!$workexperience) {
            return view('job-seekers.work-experience.work-null', $data);
        }
        return view('job-seekers.work-experience.work-null', $data);
    }


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
