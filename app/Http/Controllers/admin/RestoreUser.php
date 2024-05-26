<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RestoreUser extends Controller
{
    public function index()
    {
        //
        $users = User::onlyTrashed()->get();
        $data = ([
            "title" => "Trash Data User",
            "users" => $users
        ]);

        return view('super-admin.trash data.user', $data);
    }

    public function restore($id)
    {
        try {
            $restore_jobcategory = User::withTrashed()->where('id', $id)->restore();
            Alert::success("Sukses", "Restore Data Sukses");
        } catch (\Throwable $th) {
            Alert::error("Gagal", $th->getMessage());
        } finally {
            return redirect("/admin/user");
        }

    }
    public function destroy($id)
    {
        try {
            $user = User::withTrashed()->findOrFail($id);
            $user->forceDelete();
            Alert::success('Sukses', 'Delete data success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return redirect("/admin/trash-user");
        }
    }
}
