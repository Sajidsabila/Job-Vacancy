<?php

namespace App\Http\Controllers\Admin;

use App\Models\Benefit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $benefits = Benefit::all();
        $data = ([
            "title" => "Data Benefit",
            "benefits" => $benefits
        ]);
        return view("super-admin.benefit.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            "title" => "Add Benefit",
        ];

        return view('super-admin.benefit.form', $data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'benefit' => 'required|min:3',
        ]);

        Benefit::create($data);
        Alert::success('Sukses', 'Add data success.');
        return redirect('/admin/benefit')->with('success', 'Benefit added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $benefit = Benefit::find($id);
        if (!$benefit) {
            return redirect('/admin/benefit')->with("errorMessage", "Religion Tidak Ditemukan");
        }
        $data = [
            "title" => "Edit Benefit",
            "benefit" => $benefit,
        ];

        return view('super-admin.benefit.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->validate([
            'benefit' => 'required|min:3',
        ]);

        try {
            $benefit = Benefit::find($id);
            $benefit->update($data);
            Alert::success('Sukses', 'Edit data success.');
            return redirect('/admin/benefit');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->route('super-admin.religion.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
