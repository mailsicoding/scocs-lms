<?php

use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Student\CourseController as StudentCourseController;
use App\Http\Controllers\Student\LoginController as StudentLoginController;
use App\Http\Controllers\Student\PasswordController as StudentPasswordController;
use App\Http\Controllers\Teacher\LoginController as TeacherLoginController;
use App\Http\Controllers\Teacher\PasswordController as TeacherPasswordController;
use App\Http\Controllers\Teacher\CourseController as TeacherCourseController;
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
    Route::resource('classes',ClassController::class);
    Route::resource('students',StudentController::class);
    Route::resource('courses',CourseController::class);
    Route::post('courses/class/assign',[CourseController::class,'assignStore'])->name('courses.assign');
    Route::post('courses/class/delete',[CourseController::class,'assignDestroy'])->name('courses.assign.destroy');
    Route::resource('teachers',TeacherController::class);
    Route::post('courses/teacher/assign/{course}/{teacher}',[TeacherController::class,'assign_teacher_course'])->name('courses.teacher.assign');
    Route::delete('courses/teacher/assign/delete/{id}',[TeacherController::class,'delete_assign_teacher_course'])->name('courses.teacher.assign.delete');
    Route::post('logout',[LoginController::class,'logout'])->name('admin.logout');
    
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
    Route::get('courses/current',[TeacherCourseController::class,'current'])->name('teacher.courses.current');
    Route::get('courses/view/{id}',[TeacherCourseController::class,'view'])->name('teacher.courses.view');
    Route::get('courses/meterial',[TeacherCourseController::class,'meterial'])->name('teacher.courses.meterial');
    Route::get('courses/meterial/upload',[TeacherCourseController::class,'uploadMeterial'])->name('teacher.courses.meterial.upload');
    Route::post('courses/meterial/upload',[TeacherCourseController::class,'uploadedMeterial'])->name('teacher.courses.meterial.uploaded');
    Route::get('courses/meterial/view/{id}',[TeacherCourseController::class,'meterialView'])->name('teacher.courses.meterial.view');
    Route::post('/image/update',[HomeController::class,'teacher_image_update'])->name('teacher.image.update');
    Route::post('/password/update',[HomeController::class,'teacher_password_update'])->name('teacher.password.update');
    Route::get('courses/attendance',[TeacherCourseController::class,'attendance'])->name('teacher.courses.attendance');
    Route::get('courses/attendance/{id}',[TeacherCourseController::class,'attendance_course'])->name('teacher.courses.attendance.course');
    Route::post('courses/attendance/mark/{id}',[TeacherCourseController::class,'attendance_mark'])->name('teacher.courses.attendance.mark');
    Route::post('logout',[TeacherLoginController::class,'logout'])->name('teacher.logout');
    
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
    Route::post('/image/update',[HomeController::class,'student_image_update'])->name('student.image.update');
    Route::post('/password/update',[HomeController::class,'student_password_update'])->name('student.password.update');
    Route::post('logout',[StudentLoginController::class,'logout'])->name('student.logout');
    Route::get('courses/current',[StudentCourseController::class,'current'])->name('student.courses.current');
    Route::get('course/current/view/{id}',[StudentCourseController::class,'view'])->name('student.courses.current.view');
    Route::get('courses/offered',[StudentCourseController::class,'offered'])->name('student.courses.offered');
    Route::get('courses/meterial',[StudentCourseController::class,'meterial'])->name('student.courses.meterial');
    Route::get('courses/meterial/view/{id}',[StudentCourseController::class,'meterialView'])->name('student.courses.meterial.view');
    Route::post('courses/offered/load',[StudentCourseController::class,'offeredLoad'])->name('student.courses.offered.load');
    Route::get('courses/offered/register/{id}',[StudentCourseController::class,'offeredRegister'])->name('student.courses.offered.register');
    Route::get('courses/offered/unregister/{id}',[StudentCourseController::class,'offeredUnRegister'])->name('student.courses.offered.unregister');
    
});
