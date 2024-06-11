<?php
namespace App\Http\Controllers;

use App\Models\Configuration;

class ConfigurationController extends Controller
{
    public function index()
    { 
        $configurations = Configuration::first();
        $data = [
           
            "configurations" => $configurations
        ];
        return view('landing-page.layouts.footer', $data);
    }
}