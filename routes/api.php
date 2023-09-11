<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\AuthController;

// Login Admin
Route::post('/admin/login', [App\Http\Controllers\AdminAuthController::class, 'login'])->name('admin.login');

// Login Approver
Route::post('/approval/login', [App\Http\Controllers\ApproverAuthController::class, 'login'])->name('approval.login');
