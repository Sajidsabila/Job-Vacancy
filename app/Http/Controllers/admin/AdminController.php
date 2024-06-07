<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Models\Configuration;
use App\Http\Controllers\Controller;
use Diglactic\Breadcrumbs\Breadcrumbs;

class AdminController extends Controller
{
    //
    public function index()
    {
        $configurations = Configuration::all();
        $data = ([
            'title' => 'Data Perusahaan Website',
            'configurations' => $configurations,

        ]);
        return view('super-admin.dashboard.index', $data);
    }
}