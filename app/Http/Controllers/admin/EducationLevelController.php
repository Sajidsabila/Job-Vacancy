<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\EducationLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class EducationLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //select * from EducationLevels where role
        $educationLevels = EducationLevel::all();

        $data = [
            "title" => "Education Levels",
            "educationLevels" => $educationLevels
        ];
        return view('super-admin.educationLevel.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            "title" => "Add EducationLevel",
        ];
        return view('super-admin.educationLevel.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $messages = [
            'level.required' => 'Tolong isi namenya.',
            'description.required' => 'Isi donk deskripsinya',
            // Define more custom messages here
        ];

        $data = $request->validate([
            'level' => 'required',
            'description' => 'required'
        ], $messages);

        try {
            // $data['user_id'] = auth()->user()->id;
            EducationLevel::create($data);

            Alert::success('Sukses', 'Add data success.');

            return redirect('admin/educationLevel');

            //return redirect('EducationLevel')->with("successMessage", "add data success");
        } catch (\Throwable $th) {

            Alert::error('Error', $th->getMessage());
            return redirect('admin/educationLevel');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //select * from EducationLevels where role
        $educationLevel = EducationLevel::find($id);

        $data = [
            "title" => "EducationLevel Detail",
            "educationLevel" => $educationLevel
        ];
        return view('super-admin.educationLevel.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $educationLevel = EducationLevel::find($id);
        //TODO: you can add some protection to disallow random number
        if (!$educationLevel) {
            return redirect('admin/educationLevel')->with('errorMessage', "EducationLevel Tidak Ditemukan");
        }
        $data = [
            "title" => "Edit EducationLevel",
            "educationLevel" => $educationLevel
        ];
        return view('super-admin.educationLevel.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'level.required' => 'Tolong isi namanya.',
            'description.required' => 'Isi dong deskripsinya',
            // Define more custom messages here
        ];

        $data = $request->validate([
            'level' => 'required',
            'description' => 'required'
        ], $messages);

        try {
            // $data['user_id'] = auth()->user()->id;
            $EducationLevel = EducationLevel::find($id);

            $EducationLevel->update($data);

            Alert::success('Sukses', 'Update data success.');

            return redirect('admin/educationLevel');
        } catch (\throwable $th) {

            Alert::error('Error', $th->getMessage());

            return redirect('admin/educationLevel');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $educationLevel = EducationLevel::find($id);
            $educationLevel->delete();

            Alert::success('Sukses', 'Delete data success.');

            return redirect('admin/educationLevel');
        } catch (\Throwable $th) {

            Alert::error('Error', $th->getMessage());
            return redirect('admin/educationLevel');
        }
    }

}
