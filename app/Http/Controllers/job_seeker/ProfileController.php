<?php

namespace App\Http\Controllers\job_seeker;

use App\Models\Religion;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $religions = Religion::all();
        $jobseeker = JobSeeker::where('id', $user->id)->first();
        $data = ([
            "title" => "Profile User",
            "jobseeker" => $jobseeker,
            "religions" => $religions
        ]);
        if (!$jobseeker) {
            return view('job-seekers.form-profile', $data);
        }
        return view('job-seekers.profile', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "photo" => "required|mimes:jpg,png,jpeg|max:512",
            "nik" => "required",
            "religion_id" => "required",
            "birth_date" => "required",
            "first_name" => "required",
            "last_name" => "required",
            "gender" => "required",
            "address" => "required",
            "phone" => "required",
            "description" => "required"
        ]);

        try {
            $data['id'] = auth()->user()->id;
            if ($request->hasFile('photo')) {
                $data['photo'] = $request->file('photo')->store('img/Job_Seekers_Profile', 'public');
            } else {
                $data['photo'] = null;
            }
            JobSeeker::create($data);
            Alert::success("Suksess", "Data Berhasil Di Input");
            return redirect("/profile");
        } catch (\Throwable $th) {
            Alert::error("Gagal", $th->getMessage());
            return back();
        }
    }

    public function show(string $id)
    {
        $user = Auth::user();
        $jobseeker = JobSeeker::where('id', $user->id)->firstOrFail();

        $religions = Religion::all();

        $data = ([
            "title" => "Edit Data",
            "jobseeker" => $jobseeker,
            "religion" => $religions
        ]);

        return view("job-seekers.form-profile", $data);
    }

    public function edit(string $id)
    {
        $user = Auth::user();
        $jobseeker = JobSeeker::where('id', $user->id)->firstOrFail();
        $religions = Religion::all();

        $data = ([
            "title" => "Edit Data",
            "jobseeker" => $jobseeker,
            "religions" => $religions
        ]);

        return view("job-seekers.form-profile", $data);
    }
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            "photo" => "mimes:jpg,png,jpeg|max:512",
            "nik" => "required",
            "religion_id" => "required",
            "birth_date" => "required",
            "first_name" => "required",
            "last_name" => "required",
            "gender" => "required",
            "address" => "required",
            "phone" => "required",
            "description" => "required"
        ]);

        try {
            $user = Auth::user();
            $jobseeker = JobSeeker::where('id', $user->id)->firstOrFail();
            $data['id'] = auth()->user()->id;

            if ($request->hasFile('photo')) {
                if ($jobseeker->photo) {
                    Storage::delete($jobseeker->photo);
                }

                $data['photo'] = $request->file('photo')->store('img/Job_Seekers_Profile', 'public');
            } else {
                $data['photo'] = $jobseeker->photo;
            }
            $jobseeker->update($data);
            Alert::success('Sukses', 'Edit Data success.');
            return redirect("/profile");
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return back();
        }
    }
}
