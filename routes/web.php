<?php

use App\Http\Controllers\admin\ReligionController;
use App\Http\Controllers\admin\RestoreDataJobCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\admin\AdminController;


use App\Http\Controllers\RegisterCompanieController;
use App\Http\Controllers\admin\JobCategoryController;
use App\Http\Controllers\admin\ConfigurationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\job_seeker\LandingPageController;

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

Route::prefix('/')->group(function () {
    Route::get('/', [LandingPageController::class, 'index']);
    Route::get('/job category', [LandingPageController::class, 'getJobCategory']);
})->middleware('guest');



Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('/configuration', ConfigurationController::class);
    Route::resource('/job-category', JobCategoryController::class);
    Route::resource('/religion', ReligionController::class);
    Route::get('/trash-job-category', [RestoreDataJobCategory::class, 'index']);
    Route::delete('/restore-job-category/{id}', [RestoreDataJobCategory::class, 'index']);
});

Route::post('/auth', [AuthController::class, 'login']);
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');

})->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verify', function () {
    return view('register.verify-email');
})->middleware('auth')->name('verification.notice');



Route::resource('/job-category', JobCategoryController::class);