<?php

use App\Http\Controllers\Admin\BenefitController;
use App\Models\User;
use App\Models\JobHistory;
use GuzzleHttp\Middleware;
use App\Livewire\JobListNavigation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\RestoreUser;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Company\JobController;
use App\Http\Controllers\Admin\RestoreJobSeeker;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\ReligionController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\RestoreApplyProcess;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\JobSeeker\AboutController;
use App\Http\Controllers\RegisterCompanieController;

use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\JobTimeTypeController;
use App\Http\Controllers\Company\CompanyRequirementController;
use App\Http\Controllers\Company\CompanyBenefitController;
use App\Http\Controllers\Admin\RequirementController;
use App\Http\Controllers\Company\DashboardController;
use App\Http\Controllers\JobSeeker\ListJobController;
use App\Http\Controllers\JobSeeker\ProfileController;
use App\Http\Controllers\Admin\AdminContactController;
use App\Http\Controllers\Admin\ApplyProcessController;
use App\Http\Controllers\Admin\RestoreDataJobCategory;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\ConfigurationController;
use App\Http\Controllers\JobSeeker\EducationController;
use App\Http\Controllers\Admin\EducationLevelController;
use App\Http\Controllers\Admin\RestoreCompanyController;

use App\Http\Controllers\Admin\RestoreContactController;

use App\Http\Controllers\JobSeeker\JobDetailsController;

use App\Http\Controllers\JobSeeker\JobHistoryController;
use App\Http\Controllers\JobSeeker\JobListingController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\RestoreEduLevelController;
use App\Http\Controllers\Admin\RestoreReligionController;

use App\Http\Controllers\Company\CompanyProfilController;
use App\Http\Controllers\JobSeeker\LandingPageController;
use App\Http\Controllers\JobSeeker\TestimonialController;
use App\Http\Controllers\Admin\RestoreJobTimeTypeController;
use App\Http\Controllers\JobSeeker\WorkExperienceController;
use App\Http\Controllers\Company\InterviewScheduleController;
use App\Http\Controllers\JobSeeker\JobSeekerContactController;


use App\Http\Controllers\SocialiteController;

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
Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->middleware('guest');
Route::post('/forgot-password/send', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('forgot-password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::get('/register/job-seekers', [RegisterController::class, 'index'])->middleware('guest');
Route::get('/register/companies', [RegisterCompanieController::class, 'index'])->middleware('guest');
Route::get('/verify-email/{token}', [RegisterController::class, 'verifyEmail'])->name('verify.email');
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

    Route::get('landing-page/layouts/footer', [ConfigurationController::class, 'footer'])->name('landing-page.layouts.footer');
    Route::resource('/landing-page/layouts/footer', ConfigurationController::class);

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
    Route::get("/job-seekers/list-job", [LandingPageController::class, "listjob"]);
    Route::get('listing-job', [JobListingController::class, 'filteredjob']);
})->middleware('guest');




Route::group([
    'middleware' => ['auth', 'checkRole:Admin'],
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {

    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/configuration', ConfigurationController::class);
    Route::resource('/job-category', JobCategoryController::class);
    Route::resource('/religion', ReligionController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/list-perusahaan', CompanyController::class);
    Route::resource('/job-category', JobCategoryController::class);
    Route::get('/trash-job-category', [RestoreDataJobCategory::class, 'index'])->name('trashcategory');
    Route::get('/trash-job-seeker', [RestoreJobSeeker::class, 'index'])->name('trashjobseeker');
    Route::get('/trash-company', [RestoreCompanyController::class, 'index'])->name('trashcompany');
    Route::get('/trash-religion', [RestoreReligionController::class, 'index'])->name('trashreligion');
    Route::get('/trash-user', [RestoreUser::class, 'index'])->name('trashuser');
    Route::get('/restore-job-category/{id}', [RestoreDataJobCategory::class, 'restore'])->name('restorejobcategory');
    Route::get('/restore-religion/{id}', [RestoreReligionController::class, 'restore']);
    Route::get('/user/{id}', [RestoreUser::class, 'restore']);
    Route::delete('/delete-job-category/{id}', [RestoreDataJobCategory::class, 'destroy']);
    Route::delete('/delete-religion/{id}', [RestoreReligionController::class, 'destroy']);
    Route::delete('/delete-user/{id}', [RestoreUser::class, 'destroy']);
    Route::resource('/user', UserController::class);
    Route::resource('/benefit', BenefitController::class);
    Route::resource('/testimoni', TestimoniController::class);
    Route::resource('/applyProcess', ApplyProcessController::class);
    Route::get('/contact', [AdminContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [AdminContactController::class, 'store'])->name('contact.store');
    Route::delete('/contact/{id}', [AdminContactController::class, 'destroy'])->name('contact.destroy');
    Route::get('/trash-contact', [RestoreContactController::class, 'index']);
    Route::get('/restore-contact/{id}', [RestoreContactController::class, 'restore']);
    Route::delete('/delete-contact/{id}', [RestoreContactController::class, 'destroy']);
    Route::resource('/list-perusahaan', CompanyController::class);
    Route::resource('/job-category', JobCategoryController::class);
    Route::resource('/educationLevel', EducationLevelController::class);
    Route::resource('/requirement', RequirementController::class);
    Route::get('/trash-educationLevel', [RestoreEduLevelController::class, 'index'])->name('educationlevel');
    Route::get('/restore-educationLevel/{id}', [RestoreEduLevelController::class, 'restore']);
    Route::delete('/delete-educationLevel/{id}', [RestoreEduLevelController::class, 'destroy']);
    Route::resource('/jobTimeType', JobTimeTypeController::class);
    Route::get('/trash-jobTimeType', [RestoreJobTimeTypeController::class, 'index'])->name('jobtyme');

    Route::get('/trash-contact', [RestoreContactController::class, 'index'])->name('trashcontact');

    Route::get('/restore-jobTimeType/{id}', [RestoreJobTimeTypeController::class, 'restore']);
    Route::delete('/delete-jobTimeType/{id}', [RestoreJobTimeTypeController::class, 'destroy']);
    Route::get('/trash-applyProcess', [RestoreApplyProcess::class, 'index'])->name('applyprocess');
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
    Route::resource('/requirement', CompanyRequirementController::class);
    Route::resource('/benefit', CompanyBenefitController::class);
    Route::resource('/lowongan-kerja', JobController::class);
    Route::post('/lowongan-kerja/order', [JobController::class, 'order']);
    Route::get('/lowongan-kerja/invoice/{id}', [JobController::class, 'invoice']);
    // Route::post('/lowongan-kerja/order/midtrans-calback', [JobController::class, 'callback']);
    Route::get('/lowongan-kerja/create-publish/{id}', [JobController::class, 'createpublishedjob'])->name('lowongan-kerja.set_publish');
    Route::get('/lowongan-kerja/view-pdf/{id}', [JobController::class, 'viewPDF'])->name('pdf.view');
    Route::get('/lowongan-kerja/set-interview/{id}', [InterviewScheduleController::class, 'edit'])->name('lowongan-kerja.set_interview');
    Route::put('/lowongan-kerja/schedule-interview/{id}', [InterviewScheduleController::class, 'update'])->name('schedule.interview');
    Route::get('/lowongan-kerja/reject/{id}', [JobController::class, 'reject']);
    Route::get('/lowongan-kerja/accept/{id}', [JobController::class, 'accept']);
});

Route::post('/auth', [AuthController::class, 'login']);
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');

})->middleware(['auth', 'signed'])->name('verification.verify');
Route::get('/email/verify', function () {
    return view('register.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('login/google/redirect', [SocialiteController::class, 'redirect'])
    ->middleware(['guest'])
    ->name('redirect');

// Untuk callback dari Google
Route::get('/google/callback', [SocialiteController::class, 'callback'])
    ->middleware(['guest'])
    ->name('callback');

Route::post('login/google', [SocialiteController::class, 'redirect'])->name('login.google.post');