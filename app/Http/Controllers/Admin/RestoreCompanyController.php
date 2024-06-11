<?php

namespace App\Http\Controllers\Admin;

use App\Models\EducationLevel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use RealRashid\SweetAlert\Facades\Alert;

class RestoreCompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        
        $data = ([
            "title" => "List Perusahaan",
            "companies" => $companies
        ]);

        return view('super-admin.trash data.company', $data);
    }
    public function restore($id)
    {
        try {
            $restore_company = Company::withTrashed()->where('id', $id)->restore();
            Alert::success("Sukses", "Restore Data Sukses");
            return redirect('/admin/trash-company');
        } catch (\Throwable $th) {
            Alert::error("Gagal", $th->getMessage());
            return redirect("/admin/trash-company");
        }

    }

    public function destroy($id)
    {
        try {
            $company = Company::withTrashed()->findOrFail($id);
            $company->forceDelete();
            Alert::success('Sukses', 'Delete data success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return redirect('/admin/trash-company');
        }
    }
}