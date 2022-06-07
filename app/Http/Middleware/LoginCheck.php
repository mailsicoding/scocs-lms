<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::guard('admin')->check())
        {
            toastr()->success('You are already login.');
            return redirect(route('admin.dashboard'));
        }
        else if(Auth::guard('teacher')->check())
        {
            toastr()->success('You are already login.');
            return redirect(route('teacher.dashboard'));
        }
        else if(Auth::guard('student')->check())
        {
            toastr()->success('You are already login.');
            return redirect(route('student.dashboard'));
        }
        return $next($request);
    }
}
