<?php

namespace App\Http\Controllers\Admin;

use App\Models\EducationLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RestoreEduLevelController extends Controller
{
    public function index()
    {
        //
        $educationLevels = EducationLevel::onlyTrashed()->get();
        $data = ([
            "title" => "Trash Education Level",
            "educationLevels" => $educationLevels
        ]);

        return view('super-admin.trash data.educationLevel', $data);
    }
    public function restore($id)
    {
        try {
            $restore_educationLevel = EducationLevel::withTrashed()->where('id', $id)->restore();
            Alert::success("Sukses", "Restore Data Sukses");
            return redirect('/admin/trash-educationLevel');
        } catch (\Throwable $th) {
            Alert::error("Gagal", $th->getMessage());
            return redirect("/admin/trash-educationLevel");
        }

    }

    public function destroy($id)
    {
        try {
            $educationLevel = EducationLevel::withTrashed()->findOrFail($id);
            $educationLevel->forceDelete();
            Alert::success('Sukses', 'Delete data success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return redirect('/admin/trash-educationLevel');
        }
    }
}
