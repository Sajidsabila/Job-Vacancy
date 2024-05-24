<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\configuration;
use RealRashid\SweetAlert\Facades\Alert;

class ConfigurationController extends Controller
{
    public function index()
    {
        $configurations = configuration::all();
        $data = ([
            'title' => 'Data Perusahaan Website',
            'configurations' => $configurations
        ]);

        if ($configurations->isEmpty()) {
            return view('super-admin.configuration.form', $data);
        } else {
            return view('super-admin.configuration.index', $data);
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required',
            'logo' => 'required|mimes:jpg,png,jpeg|max:512',
            'company_addres' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'description' => 'required'
        ]);
        //dia tidak lolos validasi
        //nomor telpon jangan integer krn nomo telpon itu dimulai dr angka 0
        // misal 0898847474747474=>bukan iteger
        try {
            if ($request->hasFile('logo')) {
                $data['logo'] = $request->file('logo')->store('img', 'public');
            } else {
                $data['logo'] = null;
            }
            configuration::create($data);
            Alert::error('success', "Berhasil");
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            //TODO: redirect ke index 
            return redirect('super-admin.configuration.form');
        }
    }

    public function edit(string $id)
    {
        $configuration = configuration::find($id);
        $data = ([
            "title" => "Edit Data Perusahaan",
            "configuration" => $configuration
        ]);

        return view('super-admin.configuration.form', $data);
    }

}
