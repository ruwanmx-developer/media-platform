<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// application routes
Route::get('/company-application-index/{id}', [App\Http\Controllers\JobApplicationController::class, 'company_index'])->name('company-application-index');
Route::post('/company-application-delete/{id}', [App\Http\Controllers\JobApplicationController::class, 'company_hide'])->name('company-application-delete');
Route::get('/company-application-user/{id}', [App\Http\Controllers\JobApplicationController::class, 'company_view_user'])->name('company-application-user');
