<?php

namespace App\Http\Controllers\Admin;

use App\Models\JobCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RestoreDataJobCategory extends Controller
{
    public function index()
    {
        //
        $categories = JobCategory::onlyTrashed()->get();
        $data = ([
            "title" => "Trash Data Job Category",
            "categories" => $categories
        ]);

        return view('super-admin.trash data.jobcategory', $data);
    }
    public function restore($id)
    {
        try {
            $restore_jobcategory = JobCategory::withTrashed()->where('id', $id)->restore();
            Alert::success("Sukses", "Restore Data Sukses");
            return redirect('/admin/job-category');
        } catch (\Throwable $th) {
            Alert::error("Gagal", $th->getMessage());
            return redirect("/admin/restore-data-job-category");
        }

    }

    public function destroy($id)
    {
        try {
            $jobcategory = JobCategory::withTrashed()->findOrFail($id);
            $jobcategory->forceDelete();
            Alert::success('Sukses', 'Delete data success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return redirect('/admin/trash-job-category');
        }
    }
}
