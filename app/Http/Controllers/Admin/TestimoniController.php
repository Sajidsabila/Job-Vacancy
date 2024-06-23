<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimoni = Testimonial::all();
        $testimoni = Testimonial::orderby('id')->get();
        $testimonials = Testimonial::with('jobSeeker')->get();
        $data = [
            "title" => "Data Testimoni",
            "testimoni" => $testimoni,
            'testimonials' => $testimonials,
        ];

        return view('super-admin.testimoni.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            "title" => "Add Testimoni",
        ];

        return view('super-admin.testimoni.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'quote.required' => 'Tolong isi quote dengan benar.',
            'image.required' => 'Tolong unggah gambar.',
            'image.image' => 'File harus berupa gambar.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
        ];


        $data = $request->validate([
            'name' => 'required|string|max:255',
            'job' => 'required|string|max:255',
            'quote' => 'required|string|max:255',
            'image' => 'required|mimes:jpg,png,jpeg|max:1024', // Validate image
        ], $messages);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        Testimonial::create($data);

        Alert::success('Sukses', 'Add data success.');
        return redirect()->route('admin.testimoni.index')->with('success', 'Religion added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimoni = Testimonial::find($id);
        $data = [
            "title" => "Testimoni Detail",
            "testimoni" => $testimoni,
        ];
        return view('super-admin.testimoni.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimoni = Testimonial::find($id);
        if (!$testimoni) {
            return redirect('testimoni')->with("errorMessage", "Testimoni Tidak DItemukan");
        }
        $data = [
            "title" => "Edit Testimoni",
            "testimoni" => $testimoni,
        ];
        return view('super-admin.testimoni.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'quote.required' => 'Tolong isi quote dengan benar.',
            'image.image' => 'required|mimes:jpg,png,jpeg|max:512',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
        ];

        $data = $request->validate([
            'quote' => 'required|string|max:255',
            'image' => 'required|mimes:jpg,png,jpeg|max:512', // Validate image
        ], $messages);

        try {
            $testimoni = Testimonial::find($id);

            if ($request->hasFile('image')) {
                if ($testimoni->image) {
                    Storage::disk('public')->delete($testimoni->image);
                }

                $imagePath = $request->file('image')->store('images', 'public');
                $data['image'] = $imagePath;
            } else {
                $data['image'] = $testimoni->image;
            }

            $testimoni->update($data);
            Alert::success('Sukses', 'Edit data success.');
            return redirect()->route('testimoni.index');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->route('testimoni.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $testimoni = Testimonial::find($id);
            if ($testimoni->image) {
                Storage::disk('public')->delete($testimoni->image);
            }
            $testimoni->delete();
            Alert::success('Sukses', 'Delete data success.');
            return redirect()->route('admin.testimoni.index');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->route('admin.testimoni.index');
        }
    }
}