<?php

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
// invest File
use App\Http\Controllers\Invest\InvestorController;
use App\Http\Controllers\Invest\InvestmentController;

//Project File
use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Project\ProjectDashboardController;
use App\Http\Controllers\Project\ProjectExpanseController;
use App\Http\Controllers\Project\ProjectInvestmentController;
use App\Http\Controllers\Project\ProjectAuthController;
use App\Http\Controllers\Project\InstallmentController;
use App\Http\Controllers\Project\ProjectExpenseController;

// Admin File
use App\Http\Controllers\Admin\RoleController;



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

     Route::prefix('role')->group(function () {
        Route::get('/list', [RoleController::class,'index'])->name('role.list');
        Route::post('/create', [RoleController::class, 'store'])->name('store.role');
        Route::get('/view/{id}', [RoleController::class,'view'])->name('role.view');
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
        Route::prefix('name')->group(function () {
            // Project Dashboard
            Route::get('/dashboard/{id}', [ProjectDashboardController::class, 'index'])->name('project.dashboard');
            Route::get('/logout', [ProjectDashboardController::class, 'sessionDelete'])->name('project.sessionDelete');
            // Project Investment
            Route::prefix('investment')->group(function () {
                Route::get('/list', [ProjectInvestmentController::class, 'index'])->name('project.investment.list');
                Route::get('/create', [ProjectInvestmentController::class, 'create'])->name('create.project.investment');
                Route::post('/create', [ProjectInvestmentController::class, 'store'])->name('store.project.investment');
                Route::get('/view/{id}', [ProjectInvestmentController::class, 'view'])->name('project.investment.view');
            });

             // Project Investment Installment
            Route::prefix('installment')->group(function () {
                Route::get('/create/{id}', [InstallmentController::class, 'create'])->name('project.installment');
                Route::post('/create', [InstallmentController::class, 'store'])->name('store.project.installment');
            });

              // Project Expense
            Route::prefix('expense')->group(function () {
                Route::get('/list', [ProjectExpenseController::class, 'index'])->name('project.expense.list');
                Route::get('/create', [ProjectExpenseController::class, 'create'])->name('project.expense');
                Route::post('/create', [ProjectExpenseController::class, 'store'])->name('store.project.expense');
                Route::get('/view/{id}', [ProjectExpenseController::class, 'view'])->name('project.expense.view');

            });



        });

        // Route::prefix('investment')->group(function () {
        //     Route::get('/list', [ProjectInvestmentController::class,'index'])->name('project.investment.list');
        // });
    });

});

Route::prefix('project')->group(function () {
    Route::get('/login', [ProjectAuthController::class, 'create']) ->name('project_login');
    Route::post('/login_project', [ProjectAuthController::class, 'store']);
});


Route::get('/', function () {
    return view('Admin-Panel.dashboard');
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
