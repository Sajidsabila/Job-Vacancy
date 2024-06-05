<?php

use App\Http\Controllers\admin\ApplyProcessController;
use App\Http\Controllers\job_seeker\EducationController;
use App\Http\Controllers\job_seeker\JobListingController;
use App\Http\Controllers\job_seeker\ListJobController;
use App\Http\Controllers\admin\RequirementController;
use App\Http\Controllers\job_seeker\ProfileController;
use App\Http\Controllers\job_seeker\WorkExperienceController;
use App\Livewire\JobListNavigation;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\RestoreUser;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\admin\UserController;

use App\Http\Controllers\admin\TestimoniController;

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\company\JobController;
use App\Http\Controllers\admin\CompanyController;
use App\Http\Controllers\admin\ReligionController;
use App\Http\Controllers\RegisterCompanieController;
use App\Http\Controllers\admin\JobCategoryController;
use App\Http\Controllers\company\DashboardController;
use App\Http\Controllers\admin\RestoreDataJobCategory;
use App\Http\Controllers\admin\ConfigurationController;
use App\Http\Controllers\admin\EducationLevelController;
use App\Http\Controllers\admin\JobTimeTypeController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\admin\RestoreEduLevelController;
use App\Http\Controllers\admin\RestoreJobTimeTypeController;
use App\Http\Controllers\admin\RestoreReligionController;

use App\Http\Controllers\company\CompanyProfilController;
use App\Http\Controllers\job_seeker\JobDetailsController;
use App\Http\Controllers\job_seeker\LandingPageController;

use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TestimoniPublicController;

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
Route::post("/get-requirement", [JobController::class, 'getrequiremen'])->name('get_requrements');
Route::get('/job_listing', [LandingPageController::class, 'search'])->name('job_listing');

Route::prefix('/')->group(function () {
    Route::get('/', [LandingPageController::class, 'index']);
    Route::get('/job category', [LandingPageController::class, 'getJobCategory']);
    Route::get('/job-list', [ListJobController::class, 'index']);
    Route::get('/listing-job', [JobListingController::class, 'index']);
    Route::get('/job-details/{id}', [JobDetailsController::class, 'index']);
    Route::post('/send-letter', [JobDetailsController::class, 'store']);
    Route::resource("/profile", ProfileController::class);
    Route::resource("/work-experince", WorkExperienceController::class);
    Route::resource("/education-user", EducationController::class);
    Route::post("/profil/skills/create", [ProfileController::class, 'storeskill']);
    Route::get('/profile/skills/edit/{id}', [ProfileController::class, "editskill"]);
    Route::put('/profile/skills/update/{id}', [ProfileController::class, "updateskill"]);
    Route::delete('/profile/skills/delete/{id}', [ProfileController::class, "deleteskill"]);
})->middleware('guest');



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
    Route::resource('/user', UserController::class);
    Route::resource('/list-perusahaan', CompanyController::class);
    Route::resource('/job-category', JobCategoryController::class);
    Route::get('/trash-job-category', [RestoreDataJobCategory::class, 'index']);
    Route::get('/trash-religion', [RestoreReligionController::class, 'index']);
    Route::get('/trash-user', [RestoreUser::class, 'index']);
    Route::get('/restore-job-category/{id}', [RestoreDataJobCategory::class, 'restore']);
    Route::get('/restore-religion/{id}', [RestoreReligionController::class, 'restore']);
    Route::get('/user/{id}', [RestoreUser::class, 'restore']);
    Route::delete('/delete-job-category/{id}', [RestoreDataJobCategory::class, 'destroy']);
    Route::delete('/delete-religion/{id}', [RestoreReligionController::class, 'destroy']);
    Route::delete('/delete-user/{id}', [RestoreUser::class, 'destroy']);
    Route::resource('/user', UserController::class);

    Route::resource('/testimoni', TestimoniController::class);
    Route::get('/testimonis', [TestimoniPublicController::class, 'index'])->name('testimonis.index');
    Route::get('/job-seeker/testimoni', [TestimoniPublicController::class, 'jobSeekerIndex'])->name('job-seeker.testimoni.index');

    Route::resource('/applyProcess', ApplyProcessController::class);

    Route::resource('/list-perusahaan', CompanyController::class);
    Route::resource('/job-category', JobCategoryController::class);
    Route::resource('/educationLevel', EducationLevelController::class);
    Route::resource('/requirement', RequirementController::class);
    Route::get('/trash-educationLevel', [RestoreEduLevelController::class, 'index']);
    Route::get('/restore-educationLevel/{id}', [RestoreEduLevelController::class, 'restore']);
    Route::delete('/delete-educationLevel/{id}', [RestoreEduLevelController::class, 'destroy']);
    Route::resource('/jobTimeType', JobTimeTypeController::class);
    Route::get('/trash-jobTimeType', [RestoreJobTimeTypeController::class, 'index']);
    Route::get('/restore-jobTimeType/{id}', [RestoreJobTimeTypeController::class, 'restore']);
    Route::delete('/delete-jobTimeType/{id}', [RestoreJobTimeTypeController::class, 'destroy']);
});


Route::group([
    'middleware' => ['auth', 'checkRole:Company'],
    'prefix' => 'companie',
    'as' => 'companie.'
], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/company-profile', CompanyProfilController::class);
    Route::resource('/lowongan-kerja', JobController::class);
});

Route::post('/auth', [AuthController::class, 'login']);
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');

})->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verify', function () {
    return view('register.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/job-seekers/list-job', [LandingPageController::class, 'listJob'])->name('job-seekers.list-job');