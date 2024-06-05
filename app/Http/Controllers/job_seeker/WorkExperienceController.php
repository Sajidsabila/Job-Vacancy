<?php

namespace App\Http\Controllers\job_seeker;

use App\Models\JobSeeker;
use Illuminate\Http\Request;
use App\Models\WorkExperience;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $jobseeker = JobSeeker::with('user')->where('id', $user->id)->first();
        $workexperiences = WorkExperience::where('job_seeker_id', $jobseeker->id)->get();
        $data = ([
            "title" => "Profile User",
            "workexperiences" => $workexperiences,
            "jobseeker" => $jobseeker
        ]);
        if ($workexperiences->isEmpty()) {
            return view('job-seekers.work-experience.work-null', $data);
        }
        return view('job-seekers.work-experience.index', $data);
    }


    public function create()
    {
        $user = Auth::user();
        $jobseeker = JobSeeker::where('id', $user->id)->first();
        if (!$jobseeker) {
            Alert::warning("Maaf", "Silahkan Input Data Diri Dulu");
            return back();
        }
        return view("job-seekers.work-experience.form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required',
            'position' => 'required|string',
            'start_year' => 'required|integer|min:1900|max:' . date('Y'),
            'start_month' => 'required',
            'end_year' => 'sometimes',
            'end_month' => 'sometimes',
            // 'ongoing' => 'sometimes|boolean',
        ]);
        try {
            $data['job_seeker_id'] = auth()->user()->id;
            $data['ongoing'] = $request->ongoing == "on" ? 1 : 0;
            $data['end_month'] = $data['ongoing'] == 1 ? null : $data['end_month'];

            $ongoing = $request->has('ongoing') ? true : false;
            $endYear = $ongoing ? null : $request->end_year;
            $endMonth = $ongoing ? null : $request->end_month;
            $data['end_year'] = $endYear;
            $data["end_month"] = $endMonth;
            WorkExperience::create($data);
            return redirect("/work-experince");
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
        $workexperience = WorkExperience::findOrFail($id);
        $data = ([
            "workexperience" => $workexperience
        ]);

        return view('job-seekers.work-experience.form', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'company_name' => 'required',
            'position' => 'required|string',
            'start_year' => 'required|integer|min:1900|max:' . date('Y'),
            'start_month' => 'required',
            'end_year' => 'sometimes',
            'end_month' => 'sometimes',
            // 'ongoing' => 'sometimes|boolean',
        ]);
        try {
            $workexperience = WorkExperience::findOrFail($id);
            $data['job_seeker_id'] = auth()->user()->id;
            $data['ongoing'] = $request->ongoing == "on" ? 1 : 0;
            $data['end_month'] = $data['ongoing'] == 1 ? null : $data['end_month'];

            $ongoing = $request->has('ongoing') ? true : false;
            $endYear = $ongoing ? null : $request->end_year;
            $endMonth = $ongoing ? null : $request->end_month;
            $data['end_year'] = $endYear;
            $data["end_month"] = $endMonth;
            $workexperience->update($data);
            Alert::success("Berhasil", "Data Berhasil DiEdit");
            return redirect("/work-experince");
        } catch (\Throwable $th) {
            Alert::error("Gagal", $th->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $workexperience = WorkExperience::findOrFail($id);
            $workexperience->delete();
            Alert::success("Berhasil", "Hapus Data Berhasil");
            return redirect("/work-experience");
        } catch (\Throwable $th) {
            Alert::error("Gagal", $th->getMessage());
            return back();
        }
    }
}
