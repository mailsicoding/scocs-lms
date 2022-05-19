<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/teacher';

    public function showLoginForm()
    {
        return view('teachers.auth.login');
    }

    protected function guard()
    {
        return Auth::guard('teacher');
    }

    public function username()
    {
        return 'username';
    }
}
