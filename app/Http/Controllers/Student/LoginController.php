<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/student';

    public function showLoginForm()
    {
        return view('students.auth.login');
    }

    protected function guard()
    {
        return Auth::guard('student');
    }

    public function username()
    {
        return 'username';
    }
}
