<?php

namespace App\Http\Controllers\job_seeker;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use App\Models\JobCategory;
use App\Models\JobSeeker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        $jobcategories = JobCategory::all();
        $user = Auth::user();

        $testimoni = Testimoni::all();
        $testimoni = Testimoni::orderby('id')->get();
  
        $data = [
            "title" => "Data Testimoni",
            "testimoni" => $testimoni,
            "jobcategories" => $jobcategories,
            "user" => $user,
        ];

        return view('job-seekers.contact', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'quote' => 'required|string|max:255',
        ]);

        // Ambil data gambar dari tabel job-seekers berdasarkan nama
        $jobSeeker = JobSeeker::where('first_name', $request->name)->first();
        if ($jobSeeker) {
            $data['image'] = $jobSeeker->photo;
        } else {
            return redirect()->back()->withErrors(['name' => 'Job seeker not found']);
        }

        Testimoni::create($data);

        return redirect()->route('job-seekers.contact')->with('success', 'Testimoni added successfully.');
    }
}