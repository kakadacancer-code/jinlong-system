<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\RentsController;

// Public routes
Route::get('/',       fn() => redirect('/login'));
Route::get('/login',  [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard',     [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/rents',         [RentsController::class, 'index'])->name('rents.index');
    Route::post('/rents',        [RentsController::class, 'store'])->name('rents.store');
    Route::delete('/rents/{id}', [RentsController::class, 'destroy'])->name('rents.destroy');
});

// User routes
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/dashboard', fn() => view('user.dashboard'))->name('user.dashboard');
});