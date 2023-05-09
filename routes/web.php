<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\PagesController::class, 'index'])->name('index');

// company
Route::get('/company-dashboard', [App\Http\Controllers\CompanyController::class, 'index'])->name('company-dashboard');



// job routes
Route::get('/company-job-index', [App\Http\Controllers\JobController::class, 'index'])->name('company-job-index');
Route::get('/company-job-add', [App\Http\Controllers\JobController::class, 'add'])->name('company-job-add');
Route::get('/company-job-edit/{id}', [App\Http\Controllers\JobController::class, 'edit'])->name('company-job-edit');
Route::post('/company-job-create', [App\Http\Controllers\JobController::class, 'create'])->name('company-job-create');
Route::post('/company-job-update', [App\Http\Controllers\JobController::class, 'update'])->name('company-job-update');
Route::post('/company-job-delete/{id}', [App\Http\Controllers\JobController::class, 'delete'])->name('company-job-delete');
