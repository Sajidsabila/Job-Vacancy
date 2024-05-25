<?php

namespace App\Http\Controllers\admin;

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
            "title" => "Job Category",
            "categories" => $categories
        ]);

        return view('super-admin.job category.deletelog', $data);
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

    public function destroy(string $id)
    {
        try {
            $jobcategory = JobCategory::find($id);
            $jobcategory->forceDelete();
            Alert::success('Sukses', 'Delete data success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return redirect('/admin/job-category');
        }
    }
}
