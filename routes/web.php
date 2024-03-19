<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Invest\InvestorController;
use App\Http\Controllers\Invest\InvestmentController;

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





Route::prefix('admin')->group(function () {
    //Investment
    Route::prefix('investment')->group(function () {
        Route::get('/list', [InvestmentController::class,'index'])->name('list.investment');
        Route::get('/create', [InvestmentController::class, 'create'])->name('create.investment');
        Route::post('/create', [InvestmentController::class, 'store'])->name('store.investment');
        Route::get('/view/{id}', [InvestmentController::class,'view'])->name('view.investment');
    });

    // Investor
    Route::prefix('investor')->group(function () {
        Route::get('/list', [InvestorController::class,'index'])->name('list_investor');
        Route::get('/create', [InvestorController::class, 'create'])->name('create_investor');
        Route::post('/create', [InvestorController::class, 'store'])->name('store_investor');
        Route::get('/view/{id}', [InvestorController::class,'view'])->name('investor.view');
    });
});

Route::get('/', function () {
    return view('Admin-Panel.page.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
