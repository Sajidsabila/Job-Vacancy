<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RestoreOrder extends Controller
{
    public function index()
    {
        //
        $orders = Order::onlyTrashed()->get();
        $data = ([
            "title" => "Trash Data Order",
            "orders" => $orders
        ]);

        return view('super-admin.trash data.order', $data);
    }

    public function restore($id)
    {
        try {
            $restore_jobcategory = Order::withTrashed()->where('id', $id)->restore();
            Alert::success("Sukses", "Restore Data Sukses");
        } catch (\Throwable $th) {
            Alert::error("Gagal", $th->getMessage());
        } finally {
            return redirect("/admin/order");
        }

    }
    public function destroy($id)
    {
        try {
            $order = Order::withTrashed()->findOrFail($id);
            $order->forceDelete();
            Alert::success('Sukses', 'Delete data success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return redirect("/admin/trash-order");
        }
    }
}