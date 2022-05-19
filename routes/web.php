<?php

use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\LoginController as StudentLoginController;
use App\Http\Controllers\Teacher\LoginController as TeacherLoginController;
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
})->name('welcome');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
 */


Route::group(['prefix' => 'admin'],function(){

Route::get('login',[LoginController::class,'showLoginForm'])->name('admin.login.form');
Route::post('login',[LoginController::class,'login'])->name('admin.login');
Route::get('password/forgot',[PasswordController::class,'showLinkRequestForm'])->name('admin.password.forgot');
Route::post('password/email',[PasswordController::class,'sendResetLinkEmail'])->name('admin.password.link');
Route::get('password/reset/{token}',[PasswordController::class,'showResetForm'])->name('admin.password.email');
Route::post('password/reset',[PasswordController::class,'reset'])->name('admin.password.reset');

});

Route::group(['prefix' => 'admin'],function(){

    Route::get('/',[HomeController::class,'admin'])->name('admin.dashboard');
    
});

/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
 */

Route::get('teacher/login',[TeacherLoginController::class,'showLoginForm'])->name('teacher.login.form');
Route::post('teacher/login',[LoginController::class,'login'])->name('teacher.login');

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
 */

Route::get('student/login',[StudentLoginController::class,'showLoginForm'])->name('student.login.form');
Route::post('student/login',[LoginController::class,'login'])->name('student.login');
