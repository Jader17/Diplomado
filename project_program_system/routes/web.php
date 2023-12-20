<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CohortController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/welcome', [AdminController::class, 'welcome'])->name('welcome');

Route::resource('program', ProgramController::class);
Route::resource('user', UserController::class);
Route::resource('student', StudentController::class);
Route::resource('cohort', CohortController::class);
Route::resource('teacher', TeacherController::class);
Route::get('get_cohorts', [StudentController::class, 'getCohorts'])->name('getCohorts');
