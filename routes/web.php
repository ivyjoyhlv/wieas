<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserDashController;
use App\Http\Controllers\AdminDashController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ZoomController;
use App\Models\Applicant;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\BasicInfoController;
use App\Http\Controllers\UserInformationController;

Route::get('/', function () {
    return view('welcome');
});

// Sign In & Sign Up
Route::get('/signin', [LoginController::class, 'index'])->name('signin.index');
Route::post('/signin', [LoginController::class, 'login'])->name('signin.login');
Route::get('/signup', [SignupController::class, 'index'])->name('signup.index');
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');

//basic info

Route::post('userdash/settings/basic-info/store', [UserDashController::class, 'storeApplicantData'])->name('basic-info.store');
Route::post('/userdash/store-profile', [UserDashController::class, 'storeUserProfile'])->name('userdash.storeUserProfile');
// User Dashboard
Route::get('/userdash', [UserDashController::class, 'index'])->name('userdash.index');
Route::get('/userdash/settings', [UserDashController::class, 'settings'])->name('userdash.settings');
Route::post('/userdash/store', [UserDashController::class, 'store'])->name('userdash.store');
Route::post('/userdash/storeUserProfile', [UserDashController::class, 'storeApplicantProfile'])->name('userdash.storeUserProfile');
// Add this route to your routes/web.php file
Route::get('/userdash/pin/{job_id}', [UserDashController::class, 'pinJob'])->name('userdash.pinJob');
// Route for removing a pinned job
Route::get('/userdash/removePin/{job_id}', [UserDashController::class, 'removePin'])->name('userdash.removePin');


// zoom
Route::post('/zoom/create', [ZoomController::class, 'create']);
Route::get('/zoom/get', [ZoomController::class, 'getMeeting']);
Route::post('/zoom/update', [ZoomController::class, 'update']);
Route::delete('/zoom/delete', [ZoomController::class, 'delete']);
// Other routes...
Route::get('/userdash/conference', [UserDashController::class, 'conference'])->name('userdash.conference');
Route::get('/userdash/settings', [UserDashController::class, 'settings'])->name('userdash.settings');
Route::get('/userdash/jobopenings', [UserDashController::class, 'jobopenings'])->name('userdash.jobopenings');
Route::get('/userdash/jobdesc', [UserDashController::class, 'jobdesc'])->name('userdash.jobdesc');
Route::get('/userdash/pinned', [UserDashController::class, 'pinned'])->name('userdash.pinned');
Route::post('/jobs/{job}/pin', [UserDashController::class, 'pinJob'])->name('jobs.pin');
Route::post('/userdash/storeUserProfile', [UserDashController::class, 'storeApplicantProfile'])->name('userdash.storeUserProfile');

// Admin Dashboard
Route::get('/admin/signin', [AdminController::class, 'signin'])->name('admin.signin');
Route::get('/admindash', [AdminDashController::class, 'index'])->name('admindash.index');
Route::get('/admindash/joblist', [AdminDashController::class, 'joblist'])->name('admindash.joblist');
// Route to store the job details from the modal form
Route::post('/submit-job', [AdminDashController::class, 'storeJob'])->name('store.job');
Route::get('/admin/applicants', [AdminDashController::class, 'applicants'])->name('admin.applicants');
//toggle switch
Route::post('/toggle-job-status/{id}', [AdminDashController::class, 'toggleActive']);
Route::get('/job-list', [AdminDashController::class, 'joblist']);
Route::get('/archived-jobs', [AdminDashController::class, 'archivedJobs']);
Route::get('/joblist', [AdminDashController::class, 'joblist'])->name('joblist');

Route::get('/admindash/analythics', [AdminDashController::class, 'analythics'])->name('admindash.analythics');
Route::get('/admindash/conference', [AdminDashController::class, 'conference'])->name('admindash.conference');
Route::get('/admindash/applicants', [AdminDashController::class, 'applicants'])->name('admindash.applicants');

// Landing Page
Route::get('/landingpage', [LandingController::class, 'index'])->name('landingpage.index');
Route::get('/landingpage/jobs', [LandingController::class, 'jobs'])->name('landingpage.jobs');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
