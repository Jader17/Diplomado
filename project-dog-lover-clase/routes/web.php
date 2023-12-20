<?php

use App\Models\Dog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
    return view('index', [
        'dogs' => Dog::paginate(5)
    ]);
})->name('index');

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');


Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('login');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('auth.logout');

Route::get('/register', function () {
    return view('auth.register');
})->name('auth.register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('auth.register');


Route::resource('dog', DogController::class);
