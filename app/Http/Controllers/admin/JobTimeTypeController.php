<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use App\Models\JobTimeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class JobTimeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        //select * from JobTimeTypes where role
        $jobTimeTypes = JobTimeType::all();

        $data = [
            "title" => "Job Time Type",
            "jobTimeTypes" => $jobTimeTypes
        ];
        return view('super-admin.jobTimeType.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            "title" => "Add JobTimeType",
        ];
        return view('super-admin.jobTimeType.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $messages = [
            'type.required' => 'Isi Type Waktu Pekerjaan',
            // Define more custom messages here
        ];

        $data = $request->validate([
            'type' => 'required',
        ], $messages);

        try {
            // $data['user_id'] = auth()->user()->id;
            JobTimeType::create($data);

            Alert::success('Sukses', 'Add data success.');

            return redirect('admin/jobTimeType');

            //return redirect('JobTimeType')->with("successMessage", "add data success");
        } catch (\Throwable $th) {

            Alert::error('Error', $th->getMessage());
            return redirect('admin/jobTimeType');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //select * from JobTimeTypes where role
        $jobTimeType = JobTimeType::find($id);

        $data = [
            "title" => "JobTimeType Detail",
            "jobTimeType" => $jobTimeType
        ];
        return view('super-admin.jobTimeType.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jobTimeType = JobTimeType::find($id);
        //TODO: you can add some protection to disallow random number
        if (!$jobTimeType) {
            return redirect('admin/jobTimeType')->with('errorMessage', "JobTimeType Tidak Ditemukan");
        }
        $data = [
            "title" => "Edit JobTimeType",
            "jobTimeType" => $jobTimeType
        ];
        return view('super-admin.jobTimeType.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = [
            'type.required' => 'Isi Type Pekerjaan',
            // Define more custom messages here
        ];

        $data = $request->validate([
            'type' => 'required',
        ], $messages);

        try {
            // $data['user_id'] = auth()->user()->id;
            $jobTimeType = JobTimeType::find($id);

            $jobTimeType->update($data);

            Alert::success('Sukses', 'Update data success.');

            return redirect('admin/jobTimeType');
        } catch (\throwable $th) {

            Alert::error('Error', $th->getMessage());

            return redirect('admin/jobTimeType');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $jobTimeType = JobTimeType::find($id);
            $jobTimeType->delete();

            Alert::success('Sukses', 'Delete data success.');

            return redirect('admin/jobTimeType');
        } catch (\Throwable $th) {

            Alert::error('Error', $th->getMessage());
            return redirect('admin/jobTimeType');
        }
    }

}
