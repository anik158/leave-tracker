<?php

use App\Http\Controllers\LeaveApprovalController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserManagementController;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/leave-request', [LeaveRequestController::class, 'create'])->name('leave-request.create');
    Route::post('/leave-request', [LeaveRequestController::class, 'store'])->name('leave-request.store');
    Route::get('/leave-request-list', [LeaveRequestController::class, 'index'])->name('leave-history.index');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/leave-approval', [LeaveApprovalController::class, 'index'])->name('leave-approval.index');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management.index');
});

require __DIR__.'/auth.php';
