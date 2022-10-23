<?php

use App\Http\Controllers\AnakPosyanduController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DataAnakController;
use App\Http\Controllers\DataVisitorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Auth::routes();

Route::get('/', function () {
    // return view('dashboard');
});

// route for login
Route::permanentRedirect('/', '/login');
Route::post('signin', [LoginController::class, 'signin'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// route for admin
Route::middleware(['auth', 'user-access:Admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Data anak
    Route::resource('data-anak', DataAnakController::class);
    Route::get('/data-anak/{id}', [DataAnakController::class, 'show'])->name('detail-anak');

    // kunjungan anak
    Route::post('/data-anak/kunjungan/create', [DataAnakController::class, 'addKunjungan'])->name('data-anak.addKunjungan');
    Route::get('/data-anak/{id}/detail-kunjungan', [DataAnakController::class, 'showKunjungan'])->name('data-anak.showKunjungan');
    Route::put('/data-anak/kunjungan/update/{id}', [DataAnakController::class, 'upKunjungan'])->name('data-anak.upKunjungan');
    Route::delete('/data-anak/kunjungan/delete/{id}', [DataAnakController::class, 'desKunjungan'])->name('data-anak.desKunjungan');

    // Data Visitor
    Route::resource('data-visitor', DataVisitorController::class);

    // profile
    Route::resource('profile', ProfileController::class);

    // pengguna
    Route::resource('users', UserController::class);

    // kunjungan
    Route::resource('kunjungan', AnakPosyanduController::class);

    // role
    Route::get('/roles', [UserController::class, 'role'])->name('role');
});