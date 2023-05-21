<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\AdminController;
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


// Authentication

Route::get('/', function () {
    return redirect('/planning');
})->name('home');

Route::middleware(['auth'])->group(function () {

    Route::group(['prefix' => 'planning'], function () {
        Route::get('/', [
            PlanningController::class, "getIndex"
        ])->name('planning');

        Route::get('/{id}', [
            PlanningController::class, "getPlannedCourse"
        ])->name('lesson');
    });

});


Route::group(['prefix' => 'authentication'], function () {

    Route::get('register', [
        AuthController::class, "register"
    ])->name('register');

    Route::get('login', [
        LoginController::class, "login"
    ])->name('login');

    Route::post('/createUser', [
        AuthController::class, "store"
    ])->name('usercreate');

    Route::post('/login-request', [
        LoginController::class, "authenticate"
    ])->name('login-request');

    Route::post('/logout', [
        AuthController::class, "logout"
    ])->name('logout');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {

        Route::get('/dashboard', [
            AdminController::class, "dashboard"
        ])->name('dashboard');

    });
});


