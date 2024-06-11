<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Contact;
use App\Models\JobCategory;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminContactController extends Controller
{
    public function index()
    {
        // dd('AdminContactController index method called'); // Debugging
        $contacts = Contact::all();
        $data = [
            "title" => "Contact",
            "contacts" => $contacts
        ];
        return view('super-admin.contact.index', $data);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'description' => 'required',
        ]);

        // Redirect atau response setelah sukses
        try {
            // Simpan data ke database
            Contact::create($request->all());
            Alert::success('Sukses', 'Add Data Berhasil success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return redirect()->back()->with('success', 'Message sent successfully!');
        }
    }

    public function show(string $id)
    {
        //select * from JobTimeTypes where role
        $contacts = Contact::find($id);

        $data = [
            "title" => "JobTimeType Detail",
            "contacts" => $contacts
        ];
        return view('super-admin.contact.detail', $data);
    }
}