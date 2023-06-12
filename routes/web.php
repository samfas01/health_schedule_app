<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/complete/profile', [App\Http\Controllers\HomeController::class, 'CompleteProfile'])->name('home');
Route::post('/complete/profile', [App\Http\Controllers\HomeController::class, 'SubmitProfile'])->name('SubmitProfile');
Route::get('/all', [App\Http\Controllers\HomeController::class, 'all'])->name('all');
Route::get('/student', [App\Http\Controllers\HomeController::class, 'student'])->name('student');
Route::get('reschedule', [App\Http\Controllers\HomeController::class, 'reschedule'])->name("reschedule");
Route::post('makereshdedule', [App\Http\Controllers\HomeController::class, 'makereshdedule'])->name("makereshdedule");
Route::get('contact', [App\Http\Controllers\HomeController::class, 'contact'])->name("contact");
Route::post('contact', [App\Http\Controllers\HomeController::class, 'saveContact'])->name("saveContact");


Route::name('student.')->group(function () {
    Route::get('/home', [App\Http\Controllers\StudentController::class, 'home'])->name('home');
    Route::get('schedule/{id}', [App\Http\Controllers\StudentController::class, 'viewSchedule'])->name("viewSchedule");
    Route::get('generate-pdf/{id}', [App\Http\Controllers\StudentController::class, 'generateSchedulePdf'])->name("generateSchedulePdf");
    Route::get('/schedules', [App\Http\Controllers\StudentController::class, 'schedules'])->name('schedules');
    Route::post('/schedules', [App\Http\Controllers\StudentController::class, 'createSchedule'])->name('schedules');
    Route::patch('/schedules/{id}', [App\Http\Controllers\StudentController::class, 'cancelSchedule'])->name('schedules.cancel');
    Route::patch('/schedules/{id}/reschedule', [App\Http\Controllers\StudentController::class, 'reSchedule'])->name('schedules.reschedule');
});

// makereshdedule
Route::middleware(['auth','isAdmin'])->prefix('admin')->group(function () {

    Route::get('reschedule', [App\Http\Controllers\AdminController::class, 'reschedule'])->name("postreschedule");
    Route::get('schedules', [App\Http\Controllers\AdminController::class, 'activeSchedules'])->name("admin.schedules");
    Route::get('users', [App\Http\Controllers\AdminController::class, 'index'])->name("personalProfile");
    Route::get('user', [App\Http\Controllers\AdminController::class, 'showDetails'])->name('admin.home');
    Route::get('schedules/{id}', [App\Http\Controllers\AdminController::class, 'viewSchedule'])->name('admin.single_schedule');
    Route::get('print-schedule/{id}', [App\Http\Controllers\AdminController::class, 'generateSchedulePdf'])->name("admin.generateSchedulePdf");
    Route::get('date/{users:schedule_date}', [App\Http\Controllers\AdminController::class, 'printStudentDate']);
});
