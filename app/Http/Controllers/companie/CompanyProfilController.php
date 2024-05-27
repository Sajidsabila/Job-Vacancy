<?php

namespace App\Http\Controllers\companie;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CompanyProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();
        if (!$user->companies) {
            return view('companie.profil-companie.form');
        } else {
            return view('companie.profil-companie.index');
        }
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
            return redirect('Companie/profile');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
