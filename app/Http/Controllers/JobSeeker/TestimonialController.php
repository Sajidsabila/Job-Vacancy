<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\JobCategory;
use App\Models\JobSeeker;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TestimonialController extends Controller
{
    public function index()
    {
        $jobcategories = JobCategory::all();
        $user = Auth::user();
        $jobseeker = JobSeeker::with('user')->where('id', $user->id)->first();

        $testimonials = Testimonial::get();
        $configurations = Configuration::first();
        $data = [
            "title" => "Data Testimoni",
            "testimonials" => $testimonials,
            "jobcategories" => $jobcategories,
            "user" => $user,
            "configurations" => $configurations,
            'jobseeker' => $jobseeker,
        ];

        return view('job-seekers.testimonial', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'quote' => 'required|string|max:255',
            'job' => 'required|string|max:255',
        ]);

        try {
            $data['job_seeker_id'] = auth()->user()->id;
            Testimonial::create($data);
            Alert::success('Sukses', "Data Berhasil Ditambahkan");
            return redirect()->route('job-seekers.testimonial', ['#testimonials']);

        } catch (\Throwable $th) {

            Alert::error("Gagal", $th->getMessage());
            return back();
        }
    }
}