<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\RegisterCompanieController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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


Route::get('/login-page', [AuthController::class, 'index'])
    ->name('login')->name('login');
Route::get('/register/job-seekers', [RegisterController::class, 'index']);
Route::get('/register/companies', [RegisterCompanieController::class, 'index']);
Route::post('/register/proses', [RegisterCompanieController::class, 'Register']);
Route::post('/register/job-seekers/proses', [RegisterController::class, 'Register']);

Route::get('/admin', [AdminController::class, 'index']);
Route::post('/auth', [AuthController::class, 'login']);

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');

})->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verify', function () {
    return view('register.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/', [LandingPageController::class, 'index'])
    ->middleware('guest');
Route::resource('/job-category', JobCategoryController::class);