<?php

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
    return view('Admin-Panel.page.Investment.create_investor');
})->name('create.investor');
Route::get('/investor_list', function () {
    return view('Admin-Panel.page.Investment.investorList');
})->name('investor.list');
Route::get('/investor_view', function () {
    return view('Admin-Panel.page.Investment.investor_view');
})->name('investor.view');

Route::get('/create_investment', function () {
    return view('Admin-Panel.page.Investment.create_investment');
})->name('create.investment');

Route::get('/investment_list', function () {
    return view('Admin-Panel.page.Investment.investmentList');
})->name('investment.list');
Route::get('/investment_view', function () {
    return view('Admin-Panel.page.Investment.investment_view');
})->name('investment.view');

Route::get('/new_project', function () {
    return view('Admin-Panel.page.Project.New_project');
})->name('new.project');

Route::get('/project_list', function () {
    return view('Admin-Panel.page.Project.Project_List');
})->name('project.list');

Route::get('/project_view', function () {
    return view('Admin-Panel.page.Project.Project_view');
})->name('project.view');

Route::get('/project_edit', function () {
    return view('Admin-Panel.page.Project.edit_project');
})->name('project.edit');
