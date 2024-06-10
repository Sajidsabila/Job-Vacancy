<?php

namespace App\Http\Controllers\Admin;

use App\Models\Religion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RestoreReligionController extends Controller
{
    public function index()
    {
        //
        $religions = Religion::onlyTrashed()->get();
        $data = ([
            "title" => "Trash Data ",
            "religions" => $religions
        ]);

        return view('super-admin.trash data.religion', $data);
    }
    public function restore($id)
    {
        try {
            $restore_religion = Religion::withTrashed()->where('id', $id)->restore();
            Alert::success("Sukses", "Restore Data Sukses");
            return redirect('/admin/religion');
        } catch (\Throwable $th) {
            Alert::error("Gagal", $th->getMessage());
            return redirect("/admin/trash-religion");
        }

    }

    public function destroy($id)
    {
        try {
            $religion = Religion::withTrashed()->findOrFail($id);
            $religion->forceDelete();
            Alert::success('Sukses', 'Delete data success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return back();
        }
    }
}
