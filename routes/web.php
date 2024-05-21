<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPage;
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

Route::get('/', [LandingPage::class, 'index']);
Route::get('/login', [AuthController::class, 'index']);
Route::get('/register/job-seekers', [RegisterController::class, 'index'])->name('getDataUrl');
Route::get('/register/companies', [RegisterCompanieController::class, 'index']);
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/auth', [AuthController::class, 'login']);
