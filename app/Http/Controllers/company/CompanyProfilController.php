<?php

namespace App\Http\Controllers\company;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $company = Company::where('id', $user->id)->first();
        $data = ([
            "title" => "Profile Perusahaan",
            "company" => $company
        ]);
        if (!$company) {
            return view('company.profil-company.form');
        }
        return view('company.profil-company.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'logo' => 'required|mimes:jpg,png,jpeg|max:512',
            'company_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'addres' => 'required',
            'deskripsi' => 'required'
        ]);

        try {
            $data['id'] = auth()->user()->id;
            if ($request->hasFile('logo')) {
                $data['logo'] = $request->file('logo')->store('img/Company-image', 'public');
            } else {
                $data['logo'] = null;
            }
            Company::create($data);
            Alert::success('Sukses', 'Add data success.');
            return redirect('Companie/company-profile');
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $company = Company::where('id', $user->id)->firstOrFail();

        $data = ([
            "title" => "Edit Data",
            "company" => $company
        ]);

        return view("company.profil-company.form", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'company_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'addres' => 'required',
            'deskripsi' => 'required'
        ]);

        try {
            $user = Auth::user();
            $company = Company::where('id', $user->id)->firstOrFail();
            $data['id'] = auth()->user()->id;

            if ($request->hasFile('logo')) {
                if ($company->logo) {
                    Storage::delete($company->logo);
                }

                $data['logo'] = $request->file('logo')->store('img/Company-image', 'public');
            } else {
                $data['logo'] = $company->logo;
            }
            $company->update($data);
            Alert::success('Sukses', 'Edit Data success.');
            return redirect('companie/company-profile');
        } catch (\Throwable $th) {
            Alert::error('Gagal', $th->getMessage());
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
