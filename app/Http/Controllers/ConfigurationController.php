<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\configuration;

class ConfigurationController extends Controller
{
    public function index()
    {
        $configuration = configuration::all();
        $data = ([
            'title' => 'Data Perusahaan Website',
            'configurations' => $configuration
        ]);
        if ($configuration->isEmpty()) {
            return view('super-admin.configuration.form', $data);
        } else {
            return view('configuration.index', $data);
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'logo' => 'required|mimes: jpg,png,jpeg|max:512',
            'company_name' => 'required',
            'company_addres' => 'required',
            'phone' => 'required|integer',
            'email' => 'required|email',
            'description' => 'required'
        ]);


        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('img', 'public');
        } else {
            $data['logo'] = null;
        }
        configuration::create($data);
        dd($data);
    }
}
