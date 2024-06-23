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
        $configurations = Configuration::all();
        $data = [
            "title" => "Contact Us",
            "configurations" => $configurations
        ];
        return view('job-seekers.contact', $data);  // Path ke view contact.blade.php
    }

    public function store(Request $request)
    {
        $configurations = Configuration::all();
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required',
            'configurations' => $configurations,      
        ]);

        // Simpan data ke database
        Contact::create($data);

        // Redirect kembali ke halaman kontak dengan pesan sukses
        return back()->with('success', 'Data Saved Successfully.');
    }

    public function destroy(string $id)
    {
        try {
            $contacts = Contact::find($id);
            $contacts->delete();

            Alert::success('Sukses', 'Delete data success.');

            return redirect('super-admin/contact');
        } catch (\Throwable $th) {

            Alert::error('Error', $th->getMessage());
            return redirect('super-admin/contact');
        }
    }

}