<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterCompanieController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register/job-seekers', [RegisterController::class, 'index']);
Route::get('/register/companies', [RegisterCompanieController::class, 'index']);
