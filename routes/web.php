<?php

use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\LoginController as StudentLoginController;
use App\Http\Controllers\Student\PasswordController as StudentPasswordController;
use App\Http\Controllers\Teacher\LoginController as TeacherLoginController;
use App\Http\Controllers\Teacher\PasswordController as TeacherPasswordController;
use Illuminate\Support\Facades\Artisan;
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
})->name('welcome')->middleware(['login_check']);

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
 */


Route::group(['prefix' => 'admin','middleware' => ['login_check']],function(){

    Route::get('login',[LoginController::class,'showLoginForm'])->name('admin.login.form');
    Route::post('login',[LoginController::class,'login'])->name('admin.login');
    Route::get('password/forgot',[PasswordController::class,'showLinkRequestForm'])->name('admin.password.forgot');
    Route::post('password/email',[PasswordController::class,'sendResetLinkEmail'])->name('admin.password.link');
    Route::get('password/reset/{token}',[PasswordController::class,'showResetForm'])->name('admin.password.email');
    Route::post('password/reset',[PasswordController::class,'reset'])->name('admin.password.reset');

});

Route::group(['prefix' => 'admin', 'middleware' => ['admin']],function(){

    Route::get('/',[HomeController::class,'admin'])->name('admin.dashboard');
    Route::resource('class',ClassController::class);
    Route::resource('student',StudentController::class);
    Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');
    
});

/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
 */

Route::group(['prefix' => 'teacher','middleware' => ['login_check']],function(){

    Route::get('login',[TeacherLoginController::class,'showLoginForm'])->name('teacher.login.form');
    Route::post('login',[TeacherLoginController::class,'login'])->name('teacher.login');
    Route::get('password/forgot',[TeacherPasswordController::class,'showLinkRequestForm'])->name('teacher.password.forgot');
    Route::post('password/email',[TeacherPasswordController::class,'sendResetLinkEmail'])->name('teacher.password.link');
    Route::get('password/reset/{token}',[TeacherPasswordController::class,'showResetForm'])->name('teacher.password.email');
    Route::post('password/reset',[TeacherPasswordController::class,'reset'])->name('teacher.password.reset');

});

Route::group(['prefix' => 'teacher', 'middleware' => ['teacher']],function(){

    Route::get('/',[HomeController::class,'teacher'])->name('teacher.dashboard');
    Route::get('logout',[TeacherLoginController::class,'logout'])->name('teacher.logout');
    
});

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
 */

Route::group(['prefix' => 'student','middleware' => ['login_check']],function(){

    Route::get('login',[StudentLoginController::class,'showLoginForm'])->name('student.login.form');
    Route::post('login',[StudentLoginController::class,'login'])->name('student.login');
    Route::get('password/forgot',[StudentPasswordController::class,'showLinkRequestForm'])->name('student.password.forgot');
    Route::post('password/email',[StudentPasswordController::class,'sendResetLinkEmail'])->name('student.password.link');
    Route::get('password/reset/{token}',[StudentPasswordController::class,'showResetForm'])->name('student.password.email');
    Route::post('password/reset',[StudentPasswordController::class,'reset'])->name('student.password.reset');

});

Route::group(['prefix' => 'student', 'middleware' => ['student']],function(){

    Route::get('/',[HomeController::class,'student'])->name('student.dashboard');
    Route::get('logout',[StudentPasswordController::class,'logout'])->name('student.logout');
    
});
