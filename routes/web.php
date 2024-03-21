<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Invest\InvestorController;
use App\Http\Controllers\Invest\InvestmentController;
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Project\ProjectDashboardController;
use App\Http\Controllers\Project\ProjectExpanseController;
use App\Http\Controllers\Project\ProjectInvestmentController;

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

    // Project
    Route::prefix('project')->group(function () {
        Route::get('/list', [ProjectController::class,'index'])->name('list.project');
        Route::get('/create', [ProjectController::class, 'create'])->name('create.project');
        Route::post('/create', [ProjectController::class, 'store'])->name('store.project');
        Route::get('/view/{id}', [ProjectController::class,'view'])->name('project.view');
        Route::get('/update/{id}', [ProjectController::class,'edit'])->name('project.edit');
        Route::put('/update/{id}', [ProjectController::class,'update'])->name('project.update');
        Route::delete('/delete/{id}', [ProjectController::class,'delete'])->name('project.delete');

        // Project Panel
        Route::prefix('{name}')->group(function () {
            // Project Dashboard
            Route::get('/dashboard/{id}', [ProjectDashboardController::class,'index'])->name('project.dashboard');

            // Project Investment
            Route::prefix('investment')->group(function () {
                Route::get('/list/{id}', [ProjectInvestmentController::class,'index'])->name('project.investment.list');
            });
        });

        // Route::prefix('investment')->group(function () {
        //     Route::get('/list', [ProjectInvestmentController::class,'index'])->name('project.investment.list');
        // });
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
