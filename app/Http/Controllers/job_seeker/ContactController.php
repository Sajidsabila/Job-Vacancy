<?php

namespace App\Http\Controllers\job_seeker;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\JobCategory;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function index()
    {
        $jobcategories = JobCategory::all();
        $user = Auth::user();

        $testimoni = Testimonial::orderby('id')->get();
        $configurations = Configuration::first();
        $data = [
            "title" => "Data Testimoni",
            "testimoni" => $testimoni,
            "jobcategories" => $jobcategories,
            "user" => $user,
            "configurations" => $configurations
        ];

        return view('job-seekers.contact', $data);
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
            return redirect()->route('job-seekers.contact');

        } catch (\Throwable $th) {

            Alert::error("Gagal", $th->getMessage());
            return back();
        }
    }
}