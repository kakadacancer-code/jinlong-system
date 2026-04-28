<?php

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ── Root ──────────────────────────────────────────
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// ── Properties ────────────────────────────────────
Route::get('/properties',           [PropertyController::class, 'index']) ->name('properties.index');
Route::get('/properties/create',    [PropertyController::class, 'form'])  ->name('properties.create');
Route::post('/properties',          [PropertyController::class, 'store']) ->name('properties.store');
Route::get('/properties/{id}',      [PropertyController::class, 'show'])  ->name('properties.show');
Route::get('/properties/{id}/edit', [PropertyController::class, 'edit'])  ->name('properties.edit');
Route::put('/properties/{id}',      [PropertyController::class, 'update'])->name('properties.update');
Route::delete('/properties/{id}',   [PropertyController::class, 'destroy'])->name('properties.destroy');

// ── Tenants ───────────────────────────────────────
Route::get('/tenants',           [TenantController::class, 'index']) ->name('tenants.index');
Route::get('/tenants/create',    [TenantController::class, 'form'])  ->name('tenants.create');
Route::post('/tenants',          [TenantController::class, 'store']) ->name('tenants.store');
Route::get('/tenants/{id}',      [TenantController::class, 'show'])  ->name('tenants.show');
Route::get('/tenants/{id}/edit', [TenantController::class, 'edit'])  ->name('tenants.edit');
Route::put('/tenants/{id}',      [TenantController::class, 'update'])->name('tenants.update');
Route::delete('/tenants/{id}',   [TenantController::class, 'destroy'])->name('tenants.destroy');

// ── Static pages ──────────────────────────────────
Route::get('/payments',    fn () => view('pages.payments'))   ->name('payments');
Route::get('/maintenance', fn () => view('pages.maintenance'))->name('maintenance');
Route::get('/leases',      fn () => view('pages.leases'))     ->name('leases');
Route::get('/reports',     fn () => view('pages.reports'))    ->name('reports');

// ── Logout ────────────────────────────────────────
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/');
})->name('logout');