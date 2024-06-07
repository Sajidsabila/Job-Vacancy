<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Configuration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ConfigurationController extends Controller
{
    public function index()
    {
        $configurations = Configuration::all();
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
            'tagline' => 'required',
            'description' => 'required'
        ]);
        try {
            if ($request->hasFile('logo')) {
                $data['logo'] = $request->file('logo')->store('img', 'public');
            } else {
                $data['logo'] = null;
            }
            Configuration::create($data);
            Alert::success('Sukses', 'Add Data Berhasil success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());
        } finally {
            return redirect('/admin/configuration');
        }
    }

    public function edit(string $id)
    {
        $configuration = Configuration::find($id);
        $data = ([
            "title" => "Edit Data Perusahaan",
            "configuration" => $configuration
        ]);

        return view('super-admin.configuration.form', $data);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'company_name' => 'required',
            'logo' => 'mimes:jpg,png,jpeg|max:512',
            'company_addres' => 'required',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'tagline' => 'required',
            'description' => 'required'
        ]);
        try {

            $configartion = Configuration::find($id);

            if ($request->hasFile('image')) {
                if ($configartion->logo) {
                    Storage::delete($configartion->logo);
                }

                $data['logo'] = $request->file('logo')->store('img', 'public');
            } else {
                $data['logo'] = $configartion->logo;
            }
            $configartion->update($data);

            Alert::success('Sukses', 'Edit data success.');
        } catch (\Throwable $th) {
            Alert::error('Error', $th->getMessage());

        } finally {
            return redirect('/admin/configuration');
        }
    }

}
