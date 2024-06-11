<?php

namespace App\Http\Controllers\JobSeeker;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Contact;
use App\Models\JobCategory;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class JobSeekerContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        $data = [
            "title" => "Contact",
            "contacts" => $contacts
        ];
        return view('job-seekers.contact', $data);  // Path ke view contact.blade.php
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required',
        ]);

        // Simpan data ke database
        Contact::create($request->all());

        // Redirect kembali ke halaman kontak dengan pesan sukses
        return redirect()->route('job-seekers.contact')->with('success', 'Message sent successfully!');
    }
    
}