<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Religion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $religions = Religion::orderby('id')->get();
        $data = [
            "title" => "Religions",
            "religions" => $religions,
        ];

        return view('religion.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            "title" => "Add Religion",
        ];

        return view('religion.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'id.required' => 'Tolong isi ID dengan benar.',
            'id.unique' => 'ID harus unik',
            'religion.required' => 'Isi Religion dengan benar.',
            'religion.min' => 'Religion kurang panjang minimal 3 karakter.',
        ];

        $data = $request->validate([
            'id' => 'required|unique:religions,id',
            'religion' => 'required|min:3',
        ], $messages);

        Religion::create($data);
        Alert::success('Sukses', 'Add data success.');
        return redirect('religion');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $religion = Religion::find($id);
        $data = [
            "title" => "Religion Detail",
            "religion" => $religion,
        ];

        return view('religion.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $religion = Religion::find($id);
        if (!$religion) {
            return redirect('religion')->with("errorMessage", "Religion Tidak Ditemukan");
        }
        $data = [
            "title" => "Edit Religion",
            "religion" => $religion,
        ];

        return view('religion.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'id.required' => 'Tolong isi ID dengan benar.',
            'id.unique' => 'ID harus unik',
            'religion.required' => 'Isi Religion dengan benar.',
            'religion.min' => 'Religion kurang panjang minimal 3 karakter.',
        ];

        $data = $request->validate([
            'id' => 'required|unique:religions,id,' . $id,
            'religion' => 'required|min:3',
        ], $messages);

        try {
            $religion = Religion::find($id);
            $religion->update($data);
            Alert::success('Sukses', 'Edit data success.');
            return redirect('religion');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect('religion');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $religion = Religion::find($id);
            $religion->delete();
            Alert::success('Sukses', 'Delete data success.');
            return redirect('religion');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect('religion');
        }
    }
}