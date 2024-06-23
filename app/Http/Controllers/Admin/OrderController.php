<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // select * from orders where role='order' order by name
        $orders = Order::with(['job', 'package'])->get();
        $data = [
            "title" => "Data Orders",
            "orders" => $orders,
        ];

        return view('super-admin.order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            "title" => "Add Order",
        ];

        return view('super-admin.order.form', $data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'email.required' => 'Tolong isi Email dengan benar.',
            'password.required' => 'Isi password dengan benar.',
            'password.min' => 'Password kurang panjang minimal 3.',
            'role.required' => 'Isi role dengan benar.',
            // Define more custom messages here
        ];

        $data = $request->validate([
            'email' => 'required|string|email|max:255|unique:orders',
            'password' => 'required|min:3',
            'role' => 'required',
        ], $messages);

        $data['password'] = Hash::make($data["password"]);
        Order::create($data);

        // Menggunakan sweet alert untuk memberi pesan bahwa data berhasil ditambahkan
        Alert::success('Sukses', 'Add data success.');
        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // select * from orders where id='$id'
        $order = Order::find($id);
        $data = [
            "title" => "Order Detail",
            "order" => $order,
        ];
        return view('super-admin.order.detail', $data);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::find($id);
        // TODO : u can add some protection to disallow random id
        if (!$order) {
            return redirect('order')->with("errorMessage", "Order Tidak DItemukan");
        }
        $data = [
            "title" => "Edit Order",
            "order" => $order,
        ];
        return view('super-admin.order.form', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $messages = [
            'username.required' => 'Tolong isi usernama dengan benar.',
            'username.unique' => 'Tolong isi username yang unik',
            'password.required' => 'Isi password dengan benar.',
            'password.min' => 'Password kurang panjang minimal 3.',
            'name.required' => 'Tolong isi nama dengan benar.',
            'role.required' => 'Isi role dengan benar.',
            // Define more custom messages here
        ];

        $data = $request->validate([
            'name' => 'required',
            'username' => 'required|alpha_num|unique:orders,username,' . $id,
            'password' => 'nullable|min:3',
            'role' => 'required',
        ], $messages);
        try {

            $order = Order::find($id);
            if ($request->password) {
                $data['password'] = Hash::make($data["password"]);
            } else {
                $data['password'] = $order->password;
            }

            $order->update($data);
            Alert::success('Sukses', 'Edit data success.');
            return redirect('order.index');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect('order.index');

        }

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $order = Order::find($id);
            $order->delete();
            Alert::success('Sukses', 'Delete data success.');
            return redirect('order.index');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect('order.index');

        }
    }
}