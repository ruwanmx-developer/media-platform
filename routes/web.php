<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\PagesController::class, 'index'])->name('index');

// company
Route::get('/company-dashboard', [App\Http\Controllers\CompanyController::class, 'index'])->name('company-dashboard');

// mentor
Route::get('/mentor-dashboard', [App\Http\Controllers\MentorController::class, 'index'])->name('mentor-dashboard');

// class routes
Route::get('/mentor-class-index', [App\Http\Controllers\TutionController::class, 'index'])->name('mentor-class-index');
Route::get('/mentor-class-add', [App\Http\Controllers\TutionController::class, 'add'])->name('mentor-class-add');
Route::post('/mentor-class-create', [App\Http\Controllers\TutionController::class, 'create'])->name('mentor-class-create');
Route::get('/mentor-class-edit/{id}', [App\Http\Controllers\TutionController::class, 'edit'])->name('mentor-class-edit');
Route::post('/mentor-class-update', [App\Http\Controllers\TutionController::class, 'update'])->name('mentor-class-update');
Route::post('/mentor-class-delete/{id}', [App\Http\Controllers\TutionController::class, 'delete'])->name('mentor-class-delete');

// class request pages
Route::get('/mentor-request-index/{id}', [App\Http\Controllers\TutionRequestController::class, 'mentor_index'])->name('mentor-request-index');
Route::post('/mentor-request-delete/{id}', [App\Http\Controllers\TutionRequestController::class, 'mentor_hide'])->name('mentor-request-delete');
Route::get('/mentor-request-user/{id}', [App\Http\Controllers\TutionRequestController::class, 'mentor_view_user'])->name('mentor-request-user');

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


// tutorial
Route::get('/mentor-tutorial-index', [App\Http\Controllers\TutorialController::class, 'index'])->name('mentor-tutorial-index');
Route::get('/mentor-tutorial-add', [App\Http\Controllers\TutorialController::class, 'add'])->name('mentor-tutorial-add');
Route::get('/mentor-tutorial-edit/{id}', [App\Http\Controllers\TutorialController::class, 'edit'])->name('mentor-tutorial-edit');
Route::post('/mentor-tutorial-create', [App\Http\Controllers\TutorialController::class, 'create'])->name('mentor-tutorial-create');
Route::post('/mentor-tutorial-update', [App\Http\Controllers\TutorialController::class, 'update'])->name('mentor-tutorial-update');
Route::post('/mentor-tutorial-delete/{id}', [App\Http\Controllers\TutorialController::class, 'delete'])->name('mentor-tutorial-delete');

//event
Route::get('/admin-event-index', [App\Http\Controllers\EventController::class, 'index'])->name('admin-event-index');
Route::get('/admin-event-add', [App\Http\Controllers\EventController::class, 'add'])->name('admin-event-add');
Route::get('/admin-event-edit/{id}', [App\Http\Controllers\EventController::class, 'edit'])->name('admin-event-edit');
Route::post('/admin-event-create', [App\Http\Controllers\EventController::class, 'create'])->name('admin-event-create');
Route::post('/admin-event-update', [App\Http\Controllers\EventController::class, 'update'])->name('admin-event-update');
Route::post('/admin-event-delete/{id}', [App\Http\Controllers\EventController::class, 'delete'])->name('admin-event-delete');


Route::get('/internship', [App\Http\Controllers\InternshipController::class, 'internship'])->name('internship');
Route::get('/add_job_request', [App\Http\Controllers\InternshipController::class, 'add_job_request'])->name('add_job_request');
Route::get('/my-internships', [App\Http\Controllers\InternshipController::class, 'user_requests'])->name('my-internships');

Route::get('/learn', [App\Http\Controllers\LearnController::class, 'learn'])->name('learn');

Route::get('/feed', [App\Http\Controllers\FeedController::class, 'feed'])->name('feed');
Route::get('/add-feed', [App\Http\Controllers\FeedController::class, 'add_new_feed'])->name('add-feed');
Route::post('/feed-create', [App\Http\Controllers\FeedController::class, 'create'])->name('feed-create');
Route::get('/my-feeds', [App\Http\Controllers\FeedController::class, 'user_feeds'])->name('my-feeds');

Route::get('/quiz', [App\Http\Controllers\QuizController::class, 'quiz'])->name('quiz');

Route::get('/mentor', [App\Http\Controllers\MentorController::class, 'mentor'])->name('mentor');
Route::get('/add_class_request', [App\Http\Controllers\MentorController::class, 'add_class_request'])->name('add_class_request');
Route::get('/my-mentors', [App\Http\Controllers\MentorController::class, 'user_mentors'])->name('my-mentors');

Route::get('/test', [App\Http\Controllers\PagesController::class, 'test'])->name('test');
