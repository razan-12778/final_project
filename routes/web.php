<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\StudentLoginController;
use App\Http\Controllers\StudentController;
use \App\Http\Controllers\AbsenceController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\Admin\HomeController as AdminHomeController;
use \App\Http\Controllers\Admin\AbsenceController as AdminAbsenceController;
use \App\Http\Controllers\Admin\StudentController as AdminStudentController;
use \App\Http\Controllers\Admin\UserController as AdminUserController;



Auth::routes();
Route::get('/', [StudentLoginController::class, 'showLoginForm'])->name('student.login');

Route::prefix('student')->group(function () {
    Route::get('/', [StudentLoginController::class, 'showLoginForm'])->name('student.login');
    Route::post('/login', [StudentLoginController::class, 'login'])->name('student.submit_login');
    Route::get('/register', [StudentLoginController::class, 'showRegisterForm'])->name('student.register');
    Route::post('/register', [StudentLoginController::class, 'register'])->name('student.submit_register');

    Route::get('/', [StudentController::class, 'index'])->name('student.index');

    Route::prefix('absence')->group(function (){
        Route::post('/store',[AbsenceController::class,'store'])->name('absence.store');
        Route::get('/destroy/{absence}',[AbsenceController::class,'destroy'])->name('absence.destroy');
    });

    //edit student profile
    Route::get('/edit/{student}',[StudentController::class,'edit'])->name('student.edit');
    Route::post('/update/{student}',[StudentController::class,'update'])->name('student.update');

    Route::get('logout',[StudentLoginController::class,'logout'])->name('student.logout');
});

Route::get('/contact-us',[HomeController::class,'contact'])->name('contactus');

Route::prefix('dashboard')->group(function (){
    Route::get('/',[AdminHomeController::class,'index'])->name('admin.index');
    Route::get('logout',[LoginController::class,'logout'])->name('logout');


    Route::prefix('admins')->group(function (){

    });

    Route::prefix('absence')->group(function (){
        Route::get('/',[AdminAbsenceController::class,'index'])->name('admin.absence.index');
        Route::get('/edit/{absence}',[AdminAbsenceController::class,'edit'])->name('admin.absence.edit');
        Route::post('/update/{absence}',[AdminAbsenceController::class,'update'])->name('admin.absence.update');
        Route::get('/destroy/{absence}',[AdminAbsenceController::class,'destroy'])->name('admin.absence.destroy');
    });

    Route::prefix('students')->group(function (){

        Route::get('/',[AdminStudentController::class,'index'])->name('admin.student.index');
        Route::get('/edit/{student}',[AdminStudentController::class,'edit'])->name('admin.student.edit');
        Route::post('/update/{student}',[AdminStudentController::class,'update'])->name('admin.student.update');
        Route::get('/destroy/{student}',[AdminStudentController::class,'destroy'])->name('admin.student.destroy');
    });
    Route::prefix('admins')->group(function (){

        Route::get('/',[AdminUserController::class,'index'])->name('admin.user.index');
        Route::get('/create',[AdminUserController::class,'create'])->name('admin.user.create');
        Route::post('/store',[AdminUserController::class,'store'])->name('admin.user.store');
        Route::get('/edit/{user}',[AdminUserController::class,'edit'])->name('admin.user.edit');
        Route::post('/update/{user}',[AdminUserController::class,'update'])->name('admin.user.update');
        Route::get('/destroy/{user}',[AdminUserController::class,'destroy'])->name('admin.user.destroy');
    });
});
