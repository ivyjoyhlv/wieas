<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\UserDashController;
use App\Http\Controllers\AdminDashController;
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

// Landing Page
Route::get('/landingpage', [LandingController::class, 'index'])->name('landingpage.index');
Route::get('/landingpage/jobs', [LandingController::class, 'jobs'])->name('landingpage.jobs');

// Sign In & Sign Up
Route::get('/signin', [LoginController::class, 'index'])->name('signin.index');
Route::get('/signup', [SignupController::class, 'index'])->name('signup.index');

// User Dashboard
Route::get('/userdash', [UserDashController::class, 'index'])->name('userdash.index');
Route::get('/userdash/settings', [UserDashController::class, 'settings'])->name('userdash.settings');

// Admin Dashboard
Route::get('/admindash', [AdminDashController::class, 'index'])->name('admindash.index');
Route::get('/admindash/joblist', [AdminDashController::class, 'joblist'])->name('admindash.joblist');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
