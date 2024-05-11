<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Client\ClientAuthController;
use App\Http\Controllers\Client\ClientDashboardController;


Route::get('client/login', [ClientAuthController::class, 'create'])->name('client.login');
Route::post('client/login', [ClientAuthController::class, 'store'])->name('client.login.store');

Route::middleware(['client'])->prefix('client')->group(function () {
    Route::post('dashboard', [ClientDashboardController::class, 'dashboard'])->name('client.dashboard');
});

