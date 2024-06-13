<?php

namespace App\Http\Controllers\Admin;

use App\Models\Requirement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requirements = Requirement::all();
        $data = ([
            "title" => "Data Requirement",
            "requirements" => $requirements
        ]);
        return view("super-admin.requirement.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            "title" => "Add Requirement",
        ];

        return view('super-admin.requirement.form', $data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { {
            $messages = [
                'requirements.required' => 'Isi Religion dengan benar.',
                'requirements.min' => 'Religion kurang panjang minimal 3 karakter.',
            ];

            $data = $request->validate([
                'type' => 'required|min:3',
            ], $messages);

            Requirement::create($data);
            Alert::success('Sukses', 'Add data success.');
            return redirect('/admin/requirement')->with('success', 'Religion added successfully.');
        }
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
        $requirement = Requirement::find($id);
        if (!$requirement) {
            return redirect('/admin/requirement')->with("errorMessage", "Religion Tidak Ditemukan");
        }
        $data = [
            "title" => "Edit Religion",
            "requirement" => $requirement,
        ];

        return view('super-admin.requirement.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->validate([
            'type' => 'required|min:3',
        ]);

        try {
            $requirement = Requirement::find($id);
            $requirement->update($data);
            Alert::success('Sukses', 'Edit data success.');
            return redirect('/admin/requirement');
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
