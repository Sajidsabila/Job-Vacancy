<?php

namespace App\Http\Controllers\admin;

use App\Models\ApplyProcess;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RestoreApplyProcess extends Controller
{
    public function index()
    {
        //
        $applyProcesses = ApplyProcess::onlyTrashed()->get();
        $data = ([
            "title" => "Trash Data Job Category",
            "applyProcesses" => $applyProcesses
        ]);

        return view('super-admin.trash data.ApplyProcess', $data);
    }
    public function restore($id)
    {
        try {
            $restore_ApplyProcess = ApplyProcess::withTrashed()->where('id', $id)->restore();
            Alert::success("Sukses", "Restore Data Sukses");
            return redirect('/admin/applyProcess');
        } catch (\Throwable $th) {
            Alert::error("Gagal", $th->getMessage());
            return redirect("/admin/restore-applyProcess");
        }

    }

    public function destroy($id)
    {
        try {
            $ApplyProcess = ApplyProcess::withTrashed()->findOrFail($id);
            $ApplyProcess->forceDelete();
            Alert::success('Sukses', 'Delete data success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return redirect('/admin/trash-applyProcess');
        }
    }
}
