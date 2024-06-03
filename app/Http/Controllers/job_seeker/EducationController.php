<?php

namespace App\Http\Controllers\job_seeker;

use App\Models\Education;
use App\Models\EducationLevel;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $jobseeker = JobSeeker::where('id', $user->id)->first();
        $educations = Education::where('job_seeker_id', $jobseeker->id)->get();
        $data = ([
            "title" => "Profile User",
            "educations" => $educations,
            "jobseeker" => $jobseeker
        ]);
        if ($educations->isEmpty()) {
            return view('job-seekers.education.education-null', $data);
        }

        return view('job-seekers.education.index', $data);
    }
    public function create()
    {
        $user = Auth::user();
        $educationallevels = EducationLevel::all();
        $jobseeker = JobSeeker::where('id', $user->id)->first();
        $data = ([
            "educationallevels" => $educationallevels
        ]);
        if (!$jobseeker) {
            Alert::warning("Maaf", "Silahkan Input Data Diri Dulu");
            return back();
        }
        return view("job-seekers.education.form", $data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'education_level_id' => 'required',
            'school' => 'required|string',
            'start_year' => 'required|integer|min:1900|max:' . date('Y'),
            'start_month' => 'required',
            'end_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'end_month' => 'nullable',
            'ongoing' => 'sometimes|boolean',
        ]);

        try {
            $data['job_seeker_id'] = auth()->user()->id;
            $ongoing = $request->has('ongoing') ? true : false;
            $endYear = $ongoing ? null : $request->end_year;
            $endMonthId = $ongoing ? null : $request->end_month;
            $data['end_year'] = $endYear;
            $data["end_month"] = $endMonthId;
            Education::create($data);
            return redirect("/education-user");
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
        $education = Education::with(['educationlevel'])->findOrFail($id);
        $educationallevels = EducationLevel::all();
        $data = ([
            "education" => $education,
            "educationallevels" => $educationallevels
        ]);

        return view('job-seekers.education.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'education_level_id' => 'required',
            'school' => 'required|string',
            'start_year' => 'required|integer|min:1900|max:' . date('Y'),
            'start_month' => 'required',
            'end_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'end_month' => 'nullable',
            'ongoing' => 'sometimes|boolean',
        ]);
        try {
            //code...
            $education = Education::with(['educationlevel'])->findOrFail($id);
            $education->update($data);
            Alert::success("Berhasil", "Data Berhasil DiEdit");
            return redirect("/education-user");
        } catch (\Throwable $th) {
            Alert::error("Gagal", $th->getMessage());
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
