<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProfileController;
//Admin File
// use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
// use App\Http\Controllers\Admin\AdminAuthController;
// use App\Http\Controllers\Invest\InvestorController;
// use App\Http\Controllers\Invest\InvestorController;

// invest File
// use App\Http\Controllers\Customer\CustomerController;

//Project File
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Invest\InvestmentController;
use App\Http\Controllers\Vendor\VendorController;


use App\Http\Controllers\Project\ProjectController;
use App\Http\Controllers\Project\InstallmentController;
use App\Http\Controllers\Project\ProjectPurchaseController;
use App\Http\Controllers\Project\ProjectExpenseController;
use App\Http\Controllers\Project\ProjectDashboardController;
use App\Http\Controllers\Project\ProjectInvestmentController;
use App\Http\Controllers\Project\Flat\FlatController;
use App\Http\Controllers\Project\Flat\FlatSaleController;
use App\Http\Controllers\Project\Flat\BookingController;
use App\Http\Controllers\Project\Flat\FlatReturnController;
// use App\Http\Controllers\Project\ProjectAuthController;
// use App\Http\Controllers\Admin\RegisteredAminController;

use App\Http\Controllers\Role_permission\RoleController;
use App\Http\Controllers\Role_permission\UserController;
use App\Http\Controllers\Role_permission\PermissionController;

use App\Http\Controllers\ComponyInfoController;




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



//Auth
// Route::prefix('admin')->group(function () {
//     Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('admin');
//     // Route::get('/list', [RegisteredAminController::class,'index'])->name('list.investment');
//     Route::get('/create', [RegisteredAminController::class, 'create'])->name('create.admin');
//     Route::post('/create', [RegisteredAminController::class, 'store'])->name('store.admin');
//     // Route::get('/view/{id}', [RegisteredAminController::class,'view'])->name('view.investment');
//     Route::get('login', [AdminAuthController::class, 'login'])->name('admin.login');
//     Route::post('login', [AdminAuthController::class, 'store'])->name('admin.login.store');
//     Route::post('logout', [AdminAuthController::class, 'destroy'])->name('admin.logout');
// });


Route::prefix('admin')->middleware('auth')->group(function () {

    Route::prefix('company')->group(function () {
        Route::get('/',[ComponyInfoController::class, 'index'])->name('company.info.list');
        Route::post('/create', [ComponyInfoController::class, 'store'])->name('company.info');
    });

    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

    /**------------------ Project --------------------**/
    Route::prefix('project')->group(function () {
        Route::get('/list', [ProjectController::class,'index'])->name('list.project');
        Route::get('/create', [ProjectController::class, 'create'])->name('create.project');
        Route::post('/create', [ProjectController::class, 'store'])->name('store.project');
        Route::get('/view/{id}', [ProjectController::class,'view'])->name('project.view');
        Route::get('/update/{id}', [ProjectController::class,'edit'])->name('project.edit');
        Route::put('/update/{id}', [ProjectController::class,'update'])->name('project.update');
        Route::get('/delete/{id}', [ProjectController::class,'delete'])->name('project.delete');

        // Project Panel
        Route::prefix('panel')->group(function () {
            // Project Dashboard
            Route::get('/dashboard/{id}', [ProjectDashboardController::class, 'index'])->name('project.dashboard');
            Route::get('/logout', [ProjectDashboardController::class, 'sessionDelete'])->name('project.sessionDelete');

            // Project Investment
            Route::prefix('investment')->group(function () {
                Route::get('/list', [ProjectInvestmentController::class, 'index'])->name('project.investment.list');
                Route::get('/create', [ProjectInvestmentController::class, 'create'])->name('create.project.investment');
                Route::post('/create', [ProjectInvestmentController::class, 'store'])->name('store.project.investment');
                Route::get('/view/{id}', [ProjectInvestmentController::class, 'show'])->name('project.investment.view');
            });

            // Project Investment Installment
            Route::prefix('installment')->group(function () {
                Route::get('/create/{id}', [InstallmentController::class, 'create'])->name('project.installment');
                Route::post('/create', [InstallmentController::class, 'store'])->name('store.project.installment');
            });

            // Project Purchase
            Route::prefix('purchase')->group(function () {
                Route::get('/list', [ProjectPurchaseController::class, 'index'])->name('project.purchase.list');
                Route::get('/create', [ProjectPurchaseController::class, 'create'])->name('project.purchase');
                Route::post('/create', [ProjectPurchaseController::class, 'store'])->name('store.project.purchase');
                Route::get('/{id}/show', [ProjectPurchaseController::class, 'show'])->name('project.purchase.view');

            });

            // Project Expense
            Route::prefix('expense')->group(function () {
                Route::get('/list', [ProjectExpenseController::class, 'index'])->name('project.expense.list');
                Route::get('/create', [ProjectExpenseController::class, 'create'])->name('project.expense');
                Route::post('/create', [ProjectExpenseController::class, 'store'])->name('store.project.expense');
                Route::get('/{id}/show', [ProjectExpenseController::class, 'show'])->name('project.expense.view');
                Route::get('/edit/{id}', [ProjectExpenseController::class, 'edit'])->name('project.expense.edit');
                Route::post('/{id}/edit', [ProjectExpenseController::class, 'update'])->name('project.expense.update');
            });

            // Flat
            Route::prefix('flat')->group(function () {
                Route::get('/list', [FlatController::class, 'index'])->name('flat.list');
                Route::get('/unsold', [FlatController::class, 'unSoldFlat'])->name('flat.unsold');
                Route::get('/sold', [FlatController::class, 'soldFlat'])->name('flat.sold');
                Route::get('/create', [FlatController::class, 'create'])->name('flat.add');
                Route::post('/create', [FlatController::class, 'store'])->name('flat.store');
                Route::get('/{id}/view', [FlatController::class, 'view'])->name('flat.view');
                Route::get('/{id}/edit', [FlatController::class, 'edit'])->name('flat.edit');
                Route::put('/{id}/edit', [FlatController::class, 'update'])->name('flat.update');
                Route::get('/{id}/delete', [FlatController::class, 'delete'])->name('flat.delete');


                Route::get('/sale', [FlatSaleController::class, 'index'])->name('flat.view.chart');
                Route::get('/sale/{id}', [FlatSaleController::class, 'create'])->name('flat.sale.form');
                Route::post('/{id}/booking', [BookingController::class, 'flatBooking'])->name('flat_booking');
                Route::get('/{id}/booking/view', [BookingController::class, 'BookingView'])->name('booking_view');

                Route::post('/{id}/sale', [FlatSaleController::class, 'flatSale'])->name('flat.sale');
                Route::get('/{id}/sale', [FlatSaleController::class, 'flatSaleDetails'])->name('flat.sale.details');

                Route::get('/{id}/payment', [FlatSaleController::class, 'payment'])->name('payment.from');
                Route::post('/payment', [FlatSaleController::class, 'paymentStore'])->name('payment.store');

                Route::get('/{id}/return', [FlatReturnController::class, 'index'])->name('return');
                Route::post('/return', [FlatReturnController::class, 'flatReturn'])->name('return.store');

            });

            // Project Expense
            Route::prefix('report')->group(function () {
                // Route::get('/invest_report', [ProjectExpenseController::class, 'index'])->name('invest.report');
                Route::get('/invest_report', function(){
                    return view('Project-Panel.Report.Invest_Report');
                })->name('invest.report');

            });
        });
    });
    /**------------------ Project End --------------------**/


    /**------------------ Employee --------------------**/
    Route::prefix('employee')->group(function () {
        Route::get('/list', [EmployeeController::class,'index'])->name('employee.list');
        Route::get('/create', [EmployeeController::class,'create'])->name('employee.create');
        Route::post('/create', [EmployeeController::class,'store'])->name('employee.store');
        Route::get('/{id}/edit', [EmployeeController::class,'edit'])->name('employee.edit');
        Route::put('/{id}/edit', [EmployeeController::class,'update'])->name('employee.update');
        Route::get('/{id}/view', [EmployeeController::class,'view'])->name('employee.view');
        Route::get('/{id}/delete', [EmployeeController::class,'destroy'])->name('employee.delete');
    });
    /**------------------ Employee End --------------------**/



    /**-------------- Client && Investment ------------**/
    Route::prefix('client')->group(function () {
        Route::get('/list', [ClientController::class,'index'])->name('client.list');
        Route::get('/create', [ClientController::class,'create'])->name('client.create');
        Route::post('/create', [ClientController::class,'store'])->name('client.store');
        Route::get('/{id}/edit', [ClientController::class,'edit'])->name('client.edit');
        Route::put('/{id}/edit', [ClientController::class,'update'])->name('client.update');
        Route::get('/{id}/view', [ClientController::class,'view'])->name('client.view');
        Route::delete('/{id}/delete', [ClientController::class,'destroy'])->name('client.delete');

        //Investment
        Route::prefix('investment')->group(function () {
            Route::get('/list', [InvestmentController::class,'index'])->name('list.investment');
            Route::get('/create', [InvestmentController::class, 'create'])->name('create.investment');
            Route::post('/create', [InvestmentController::class, 'store'])->name('store.investment');
            Route::get('/view/{id}', [InvestmentController::class,'view'])->name('view.investment');
        });
    });
    /**-------------- Client && Investment End------------**/

    /**-------------- Vendor ------------------**/
    Route::prefix('vendor')->group(function () {
        Route::get('/list', [VendorController::class,'index'])->name('vendor.list');
        Route::get('/create', [VendorController::class, 'create'])->name('vendor.create');
        Route::post('/create', [VendorController::class, 'store'])->name('vendor.store');
        Route::get('/{id}/view', [VendorController::class,'show'])->name('vendor.view');
        // Route::get('/{id}/edit', [VendorController::class,'edit'])->name('vendor.edit');
        // Route::put('/{id}/edit', [VendorController::class,'update'])->name('vendor.update');
        Route::get('/{id}/delete', [VendorController::class,'destroy'])->name('vendor.delete');
    });
    /**-------------- Vendor End ------------------**/


    /**-------------- User && Roles && Permissions ------------**/
    Route::prefix('permissions')->group(function() {
        // Permission
        Route::resource('/',PermissionController::class)->names([
            'index' => 'permissions.index',
            'create' => 'permissions.create',
            'store' => 'permissions.store',
            'edit' => 'permissions.edit',
            'update' => 'permissions.update',
        ]);
        Route::get('/{permissionId}/delete', [PermissionController::class, 'destroy'])->name('permissions.delete');

        //Role
        Route::resource('roles', RoleController::class)->names([
            'index' => 'roles.index',
            'create' => 'roles.create',
            'store' => 'roles.store',
            'edit' => 'roles.edit',
            'update' => 'roles.update',
        ]);
        Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy'])->name('roles.delete');
        Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole'])->name('roles.add.permission');
        Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole'])->name('roles.give.permission');

        // User
        Route::resource('users', UserController::class)->names([
            'index' => 'users.index',
            'create' => 'users.create',
            'store' => 'users.store',
            'show' => 'users.show',
            'edit' => 'users.edit',
            'update' => 'users.update',
        ]);
        Route::get('users/{userId}/delete', [UserController::class, 'destroy'])->name('users.delete');
    });
    /**-------------- User && Roles && Permissions End------------**/


});



// Route::prefix('project')->group(function () {
//     Route::get('/login', [ProjectAuthController::class, 'create']) ->name('project_login');
//     Route::post('/login_project', [ProjectAuthController::class, 'store']);
// });



Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
