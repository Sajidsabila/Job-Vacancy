<?php

namespace App\Http\Controllers\Admin;

use App\Models\JobTimeType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RestoreJobTimeTypeController extends Controller
{
    public function index()
    {
        //
        $jobTimeTypes = JobTimeType::onlyTrashed()->get();
        $data = ([
            "title" => "Trash Job Time Type",
            "jobTimeTypes" => $jobTimeTypes
        ]);

        return view('super-admin.trash data.jobTimeType', $data);
    }
    public function restore($id)
    {
        try {
            $restore_jobTimeType = JobTimeType::withTrashed()->where('id', $id)->restore();
            Alert::success("Sukses", "Restore Data Sukses");
            return redirect('/admin/trash-jobTimeType');
        } catch (\Throwable $th) {
            Alert::error("Gagal", $th->getMessage());
            return redirect("/admin/trash-jobTimeType");
        }

    }

    public function destroy($id)
    {
        try {
            $jobTimeType = JobTimeType::withTrashed()->findOrFail($id);
            $jobTimeType->forceDelete();
            Alert::success('Sukses', 'Delete data success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return redirect('/admin/trash-jobTimeType');
        }
    }
}
