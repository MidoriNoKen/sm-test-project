<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ApproverAuthController;
use App\Http\Controllers\ReservationController;

// Rute login dan logout
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk tampilan admin
Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminAuthController::class, 'index'])->name('admin.dashboard');
    Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation.index');
    Route::put('/reservation/{id}', [ReservationController::class, 'update'])->name('reservation.update');
    Route::delete('/reservation/{id}', [ReservationController::class, 'destroy'])->name('reservation.destroy');
    Route::get('/reservation/create', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('/reservation/store', [ReservationController::class, 'store'])->name('reservation.store');
    Route::resource('reservations', ReservationController::class)->except(['index', 'show', 'update', 'destroy', 'create', 'store']);
    Route::get('profile', 'AdminProfileController@index')->name('admin.profile');
    Route::put('profile/update', 'AdminProfileController@update')->name('admin.profile.update');
});

// Rute untuk tampilan approver
Route::middleware(['auth:approver'])->prefix('approver')->group(function () {
    Route::get('/', [ApproverAuthController::class, 'index'])->name('approver.dashboard');
    Route::get('/approver', [ApproverAuthController::class, 'index'])->name('approver.index');
    Route::get('reservations', 'ReservationController@index')->name('approver.reservations.index');
    Route::get('reservations/approve/{id}', 'ReservationController@approveForm')->name('approver.reservations.approve');
    Route::post('reservations/approve/{id}', 'ReservationController@approve')->name('approver.reservations.approve.submit');
    Route::get('profile', 'ApproverProfileController@index')->name('approver.profile');
    Route::put('profile/update', 'ApproverProfileController@update')->name('approver.profile.update');
});

// Rute untuk dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::get('/reports/export', 'ReportController@export')->name('reports.export');
});

// Rute untuk pendaftaran admin dan approver (optional)
Route::middleware(['guest'])->group(function () {
    Route::get('register/admin', 'AuthController@showAdminRegistrationForm')->name('register.admin');
    Route::post('register/admin', 'AuthController@adminRegister')->name('register.admin.submit');
    Route::get('register/approver', 'AuthController@showApproverRegistrationForm')->name('register.approver');
    Route::post('register/approver', 'AuthController@approverRegister')->name('register.approver.submit');
});
