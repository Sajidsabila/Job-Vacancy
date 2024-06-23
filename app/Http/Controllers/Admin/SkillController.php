<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::orderby('skill')->get();

        $data = [
            "title" => "Data Skills",
            "skills" => $skills,
        ];

        return view('super-admin.skill.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            "title" => "Add Skill",
        ];

        return view('super-admin.skill.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'skill.required' => 'Isi Skill dengan benar.',
            'skill.min' => 'Skill kurang panjang minimal 3 karakter.',
        ];

        $data = $request->validate([
            'skill' => 'required|min:3',
        ], $messages);

        Skill::create($data);
        Alert::success('Sukses', 'Add data success.');
        return redirect("/admin/skill")->with('success', 'Skill added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $skill = Skill::find($id);
        $data = [
            "title" => "Skill Detail",
            "skill" => $skill,
        ];

        return view('super-admin.skill.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $skill = Skill::find($id);
        if (!$skill) {
            return view('super-admin.skill.index')->with("errorMessage", "Skill Tidak Ditemukan");
        }
        $data = [
            "title" => "Edit Skill",
            "skill" => $skill,
        ];

        return view('super-admin.skill.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'id.required' => 'Tolong isi ID dengan benar.',
            'id.unique' => 'ID harus unik',
            'skill.required' => 'Isi Skill dengan benar.',
            'skill.min' => 'Skill kurang panjang minimal 3 karakter.',
        ];

        $data = $request->validate([
            'skill' => 'required|min:3',
        ], $messages);

        try {
            $skill = Skill::find($id);
            $skill->update($data);
            Alert::success('Sukses', 'Edit data success.');
            return redirect('/admin/skill');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect('/admin/skill');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $skill = Skill::find($id);
            $skill->delete();
            Alert::success('Sukses', 'Delete data success.');
            return redirect()->route('skill.index');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect()->route('super-admin.skill.index');
        }
    }
}