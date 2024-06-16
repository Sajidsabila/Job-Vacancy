<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RestoreContactController extends Controller
{
    public function index()
    {
        //
        $contacts = Contact::onlyTrashed()->get();
        $data = ([
            "title" => "Trash Data Contact",
            "contacts" => $contacts
        ]);

        return view('super-admin.trash data.contact', $data);
    }

    public function restore($id)
    {
        try {
            $restore_jobcategory = Contact::withTrashed()->where('id', $id)->restore();
            Alert::success("Sukses", "Restore Data Sukses");
        } catch (\Throwable $th) {
            Alert::error("Gagal", $th->getMessage());
        } finally {
            return redirect("/admin/contact");
        }

    }
    public function destroy($id)
    {
        try {
            $contact = Contact::withTrashed()->findOrFail($id);
            $contact->forceDelete();
            Alert::success('Sukses', 'Delete data success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return redirect("/admin/trash-contact");
        }
    }
}