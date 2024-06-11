<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jobseeker;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RestoreJobSeeker extends Controller
{
    public function index()
    {
        //
        $jobseekers = Jobseeker::onlyTrashed()->get();
        $data = ([
            "title" => "Trash Data Jobseeker",
            "jobseekers" => $jobseekers
        ]);

        return view('super-admin.trash data.job-seeker', $data);
    }

    public function restore($id)
    {
        try {
            $restore_jobcategory = Jobseeker::withTrashed()->where('id', $id)->restore();
            Alert::success("Sukses", "Restore Data Sukses");
        } catch (\Throwable $th) {
            Alert::error("Gagal", $th->getMessage());
        } finally {
            return redirect("/admin/job-seeker");
        }

    }
    public function destroy($id)
    {
        try {
            $jobseeker = Jobseeker::withTrashed()->findOrFail($id);
            $jobseeker->forceDelete();
            Alert::success('Sukses', 'Delete data success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return redirect("/admin/trash-job-seeker");
        }
    }
}