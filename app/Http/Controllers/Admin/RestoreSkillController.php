<?php

namespace App\Http\Controllers\Admin;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RestoreSkillController extends Controller
{
    public function index()
    {
        //
        $skills = Skill::onlyTrashed()->get();
        $data = ([
            "title" => "Trash Data ",
            "skills" => $skills
        ]);

        return view('super-admin.trash data.skill', $data);
    }
    public function restore($id)
    {
        try {
            $restore_skill = Skill::withTrashed()->where('id', $id)->restore();
            Alert::success("Sukses", "Restore Data Sukses");
            return redirect('/admin/skill');
        } catch (\Throwable $th) {
            Alert::error("Gagal", $th->getMessage());
            return redirect("/admin/trash-skill");
        }

    }

    public function destroy($id)
    {
        try {
            $skill = Skill::withTrashed()->findOrFail($id);
            $skill->forceDelete();
            Alert::success('Sukses', 'Delete data success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return back();
        }
    }
}