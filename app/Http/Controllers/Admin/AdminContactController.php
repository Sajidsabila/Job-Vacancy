<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Configuration;
use App\Models\Contact;
use App\Models\JobCategory;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

class AdminContactController extends Controller
{
    public function index()
    {
        // dd('AdminContactController index method called'); // Debugging
        $contacts = Contact::orderBy('created_at', 'desc')->get();
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
    
        $contact = Contact::find($id);

        $data = [
            "title" => "Contact",
            "contact" => $contact
        ];
        return view('super-admin.contact.detail', $data);
    }

    public function destroy(string $id)
    {
        // dd("Reached destroy method with ID: $id");
        try {
            // Log::info("Attempting to delete contact with ID: $id");
            $contact = Contact::find($id);
            $contact->delete();
            Alert::success('Sukses', 'Delete data success.');
            return redirect('/admin/contact');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        }
        return redirect('/admin/contact');
    }
}