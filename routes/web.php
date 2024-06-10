<?php

use App\Http\Controllers\Admin\ApplyProcessController;
use App\Http\Controllers\Company\InterviewScheduleController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\JobSeeker\EducationController;
use App\Http\Controllers\JobSeeker\JobHistoryController;
use App\Http\Controllers\JobSeeker\JobListingController;
use App\Http\Controllers\JobSeeker\ListJobController;
use App\Http\Controllers\Admin\RequirementController;
use App\Http\Controllers\JobSeeker\ProfileController;
use App\Http\Controllers\JobSeeker\WorkExperienceController;
use App\Livewire\JobListNavigation;
use App\Models\JobHistory;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\RestoreUser;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\AdminContactController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Company\JobController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ReligionController;
use App\Http\Controllers\RegisterCompanieController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Company\DashboardController;
use App\Http\Controllers\Admin\RestoreDataJobCategory;
use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\Admin\EducationLevelController;
use App\Http\Controllers\Admin\JobTimeTypeController;
use App\Http\Controllers\Admin\RestoreApplyProcess;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\RestoreEduLevelController;
use App\Http\Controllers\Admin\RestoreJobTimeTypeController;
use App\Http\Controllers\Admin\RestoreReligionController;

use App\Http\Controllers\Company\CompanyProfilController;
use App\Http\Controllers\JobSeeker\AboutController;
use App\Http\Controllers\JobSeeker\JobDetailsController;
use App\Http\Controllers\JobSeeker\LandingPageController;
use App\Http\Controllers\JobSeeker\TestimonialController;
use App\Http\Controllers\JobSeeker\JobSeekerContactController;

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
    Route::get('/job-details/{slug}', [JobDetailsController::class, 'index']);
    Route::post('/send-letter', [JobDetailsController::class, 'store']);
    Route::resource("/profile", ProfileController::class);
    Route::get('/about', [AboutController::class, 'index']);
    Route::resource("/work-experince", WorkExperienceController::class);
    Route::resource("/education-user", EducationController::class);
    Route::post("/profil/skills/create", [ProfileController::class, 'storeskill']);
    Route::get('/profile/skills/edit/{id}', [ProfileController::class, "editskill"]);
    Route::put('/profile/skills/update/{id}', [ProfileController::class, "updateskill"]);
    Route::delete('/profile/skills/delete/{id}', [ProfileController::class, "deleteskill"]);
    Route::get('/job-history', [JobHistoryController::class, "index"]);
    Route::post('/testimonial', [TestimoniController::class, 'index']);
    Route::get('/testimonial', [TestimonialController::class, "index"]);
    Route::get('/job-seekers/testimonial', [TestimonialController::class, 'index'])->name('job-seekers.testimonial');
    Route::post('/job-seekers/testimonial/store', [TestimonialController::class, 'store'])->name('job-seekers.testimonial.store');
    Route::get('/category/{id}', [JobListingController::class, 'showJobsByCategory'])->name('jobs.by.category');
    Route::get('/contact', [JobSeekerContactController::class, 'index'])->name('job-seekers.contact');
    Route::post('/contact', [JobSeekerContactController::class, 'store'])->name('job-seekers.contact.store');
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
    // Route::get('/testimonis', [TestimoniPublicController::class, 'index'])->name('testimonis.index');
    // Route::get('/job-seeker/testimoni', [TestimoniPublicController::class, 'jobSeekerIndex'])->name('job-seeker.testimoni.index');

    Route::resource('/applyProcess', ApplyProcessController::class);

    // Route::get('/contact', [AdminContactController::class, 'index'])->name('admin.contact.index');
    Route::resource('/contact', AdminContactController::class);
    // Route::post('/contact', [AdminContactController::class, 'store'])->name('contact.store');

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
    Route::get('/trash-applyProcess', [RestoreApplyProcess::class, 'index']);
    Route::get('/restore-applyProcess/{id}', [RestoreApplyProcess::class, 'restore']);
    Route::delete('/delete-applyProcess/{id}', [RestoreApplyProcess::class, 'destroy']);
});


Route::group([
    'middleware' => ['auth', 'checkRole:Company'],
    'prefix' => 'companie',
    'as' => 'companie.'
], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/company-profile', CompanyProfilController::class);
    Route::get('/lowongan-kerja/detail_candidate/{id}', [JobController::class, 'showJobSeeker'])->name('lowongan-kerja.detail_candidate');

    Route::resource('/lowongan-kerja', JobController::class);
    Route::get('/lowongan-kerja/view-pdf/{id}', [JobController::class, 'viewPDF'])->name('pdf.view');
    Route::get('/lowongan-kerja/set-interview/{id}', [InterviewScheduleController::class, 'edit'])->name('lowongan-kerja.set_interview');
    Route::put('/lowongan-kerja/schedule-interview/{id}', [InterviewScheduleController::class, 'update'])->name('schedule.interview');

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