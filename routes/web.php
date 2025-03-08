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

Route::get('/', function () {
    return view('welcome');
});

// Sign In & Sign Up
Route::get('/signin', [LoginController::class, 'index'])->name('signin.index');
Route::post('/signin', [LoginController::class, 'login'])->name('signin.login');
Route::get('/signup', [SignupController::class, 'index'])->name('signup.index');
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');

// User Dashboard
Route::get('/userdash', [UserDashController::class, 'index'])->name('userdash.index');

// zoom
Route::post('zoom/create', [ZoomController::class, 'createMeeting']);
Route::post('zoom/join', [ZoomController::class, 'joinMeeting']);

// Other routes...
Route::get('/userdash/conference', [UserDashController::class, 'conference'])->name('userdash.conference');
Route::get('/userdash/settings', [UserDashController::class, 'settings'])->name('userdash.settings');
Route::get('/userdash/jobopenings', [UserDashController::class, 'jobopenings'])->name('userdash.jobopenings');
Route::get('/userdash/jobdesc', [UserDashController::class, 'jobdesc'])->name('userdash.jobdesc');
// Admin Dashboard
Route::get('/admin/signin', [AdminController::class, 'signin'])->name('admin.signin');
Route::get('/admindash', [AdminDashController::class, 'index'])->name('admindash.index');
Route::get('/admindash/joblist', [AdminDashController::class, 'joblist'])->name('admindash.joblist');
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
