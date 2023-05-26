<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlanningController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;

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

        Route::get('/usercourseedit/{id}', [
            UserController::class, "getEditUserCourses"
        ])->name('usercourseeidt');

        Route::post('/userupdate', [
            UserController::class, "postUpdateUserCourse"
        ])->name('userupdatecourse');

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

        Route::get('/', [
            AdminController::class, "dashboard"
        ])->name('dashboard');

        Route::group(['prefix' => 'teachers'], function () {

            Route::get('/', [
                TeacherController::class, "getTeachers"
            ])->name('teachers');

            Route::get('/edit/{id}', [
                TeacherController::class, "getEditTeachers"
            ])->name('teacheredit');

            Route::post('/teacherupdate', [
                TeacherController::class, "postUpdateTeacher"
            ])->name('teacherupdate');

            Route::get('/teachercreate', [
                TeacherController::class, "getCreateTeacher"
            ])->name('teachercreate');

            Route::post('/postteacher', [
                TeacherController::class, "postCreateTeacher"
            ])->name('postteacher');

            Route::get('/deleteteacher/{id}', [
                TeacherController::class, "getDeleteTeacher"
            ])->name('teacherdelete');

        });

        Route::group(['prefix' => 'users'], function () {

            Route::get('/', [
                UserController::class, "getUsers"
            ])->name('users');

            Route::get('/edit/{id}', [
                UserController::class, "getEditUser"
            ])->name('useredit');

            Route::post('/userupdate', [
                UserController::class, "postUpdateUser"
            ])->name('userupdate');

        });

        Route::group(['prefix' => 'courses'], function () {

            Route::get('/', [
                CourseController::class, "getCourses"
            ])->name('courses');

            Route::get('/edit/{id}', [
                CourseController::class, "getEditCourse"
            ])->name('courseedit');

            Route::post('/courseupdate', [
                CourseController::class, "postUpdateCourse"
            ])->name('courseupdate');

            Route::get('/create', [
                CourseController::class, "getCreateCourse"
            ])->name('coursecreate');

            Route::post('/postcourse', [
                CourseController::class, "postCreateCourse"
            ])->name('postcreatecourse');

            Route::get('/deletecourse/{id}', [
                CourseController::class, "getDeleteCourse"
            ])->name('coursedelete');

            Route::get('/plan/{id}', [
                PlanningController::class, "getPlanCourse"
            ])->name('plancourse');

        });

        Route::group(['prefix' => 'planning'], function () {

            Route::post('/postplanning', [
                PlanningController::class, "postPlanCourse"
            ])->name('postplancourse');

            Route::get('/', [
                PlanningController::class, "getAdminPlanning"
            ])->name('editplanning');

            Route::get('/edit/{id}', [
                PlanningController::class, "getEditSession"
            ])->name('sessionedit');

            Route::post('/courseupdate', [
                PlanningController::class, "postEditSession"
            ])->name('posteditplanning');

            Route::get('/deletesession/{id}', [
                PlanningController::class, "getDeleteSession"
            ])->name('sessiondelete');

        });


    });

});


