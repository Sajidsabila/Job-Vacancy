<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\ApplyProcess;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class ApplyProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applyProcesses = ApplyProcess::all();
        $data = [
            "title" => "Apply Process",
            "applyProcesses" => $applyProcesses
        ];

        return view('super-admin.applyProcess.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('super-admin.applyProcess.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $data = $request->validate([
            "icon" => "required",
            "process" => "required",
            "description" => "required"
        ]);

        try {
            $applyProcesses = ApplyProcess::create($data);
            dd($applyProcesses); // Cek apakah data sudah tersimpan di dalam database
            Alert::success('Sukses', 'Add Data Berhasil success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return redirect('/admin/applyProcess');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $applyProcess = ApplyProcess::find($id);
        // $data = [
        //     "title" => "View Apply Process",
        //     "applyProcess" => $applyProcess
        // ];

        // return view('super-admin.applyProcess.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $applyProcess = ApplyProcess::find($id);
        $data = [
            "title" => "Edit Apply Process",
            "applyProcess" => $applyProcess
        ];

        return view('super-admin.applyProcess.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dd($request->all()); // Dump the entire request payload
        $data = $request->validate([
            "icon" => "required",
            "process" => "required",
            "description" => "required"
        ]);

        try {
            $applyProcess = ApplyProcess::find($id);
            $applyProcess->update($data);
            Alert::success('Sukses', 'Update Data Berhasil success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return redirect('/admin/applyProcess');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $applyProcess = ApplyProcess::find($id);
            $applyProcess->delete();
            Alert::success('Sukses', 'Delete data success.');
            return redirect('/super-admin/applyProcess');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
            return redirect('/admin/applyProcess');
        }
    }
}
