<?php

namespace App\Http\Controllers\Company;

use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class TrashJobController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $company = Company::where('id', $user->id)->first();
        $jobs = [];

        if ($company) {
            $jobs = Job::with("company")->where('company_id', $company->id)->onlyTrashed()->get();
        }

        $data = [
            "title" => "List Lowongan Kerja",
            "jobs" => $jobs
        ];

        return view("company.job.trash-job", $data);
    }

    public function restore($id)
    {
        try {
            $restored = Job::withTrashed()->where('id', $id)->restore();

            if ($restored) {
                Alert::success("Sukses", "Restore Data Sukses");
            } else {
                Alert::error("Gagal", "Restore Data Gagal");
            }
        } catch (\Throwable $th) {
            Alert::error("Gagal", $th->getMessage());
        }

        return redirect("/companie/lowongan-kerja");
    }

    public function destroy($id)
    {
        try {
            $job = Job::withTrashed()->findOrFail($id);
            $job->forceDelete();
            Alert::success('Sukses', 'Delete data success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        }

        return redirect("/companie/job/trash-job");
    }
}