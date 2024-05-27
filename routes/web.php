<?php

use App\Http\Controllers\admin\EducationLevelController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\ReligionController;
use App\Http\Controllers\admin\RestoreDataJobCategory;
use App\Http\Controllers\admin\RestoreUser;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\admin\AdminController;


use App\Http\Controllers\RegisterCompanieController;
use App\Http\Controllers\admin\JobCategoryController;
use App\Http\Controllers\admin\ConfigurationController;
use App\Http\Controllers\admin\RestoreEduLevelController;
use App\Http\Controllers\admin\UserController;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\job_seeker\LandingPageController;

use App\Models\User;


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
    ->name('login')->middleware('guest');
Route::get('/register/job-seekers', [RegisterController::class, 'index'])->middleware('guest');
Route::get('/register/companies', [RegisterCompanieController::class, 'index'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register/proses', [RegisterCompanieController::class, 'Register'])->middleware('guest');
Route::post('/register/job-seekers/proses', [RegisterController::class, 'Register'])->middleware('guest');

Route::prefix('/')->group(function () {
    Route::get('/', [LandingPageController::class, 'index']);
    Route::get('/job category', [LandingPageController::class, 'getJobCategory']);
})->middleware(['auth', 'checkRole:User']);



Route::group([
    'middleware' => ['auth', 'checkRole:Admin'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('/configuration', ConfigurationController::class);
    Route::resource('/job-category', JobCategoryController::class);
    Route::resource('/religion', ReligionController::class);
    Route::resource('/user', UserController::class);
    Route::get('/trash-job-category', [RestoreDataJobCategory::class, 'index']);
    Route::get('/trash-user', [RestoreUser::class, 'index']);
    Route::get('/restore-job-category/{id}', [RestoreDataJobCategory::class, 'restore']);
    Route::get('/user/{id}', [RestoreUser::class, 'restore']);
    Route::delete('/delete-job-category/{id}', [RestoreDataJobCategory::class, 'destroy']);
    Route::resource('/user', UserController::class);
    Route::resource('/list-perusahaan', CompanyController::class);
    Route::resource('/job-category', JobCategoryController::class);
    Route::resource('/educationLevel', EducationLevelController::class);
    Route::get('/trash-educationLevel', [RestoreEduLevelController::class, 'index']);
    Route::get('/restore-educationLevel/{id}', [RestoreEduLevelController::class, 'restore']);
    Route::delete('/delete-educationLevel/{id}', [RestoreEduLevelController::class, 'destroy']);
});

Route::prefix('Companie')->group(function () {

});

Route::post('/auth', [AuthController::class, 'login']);
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');

})->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verify', function () {
    return view('register.verify-email');
})->middleware('auth')->name('verification.notice');



