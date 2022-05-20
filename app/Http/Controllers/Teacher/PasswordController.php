<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('teachers.auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['username' => 'required']);
        $username = $request->username;
        $student = Teacher::where('username' , $username)->first();
        if($student)
        {
            DB::table('password_resets')->where('email',$student->email)->delete();
            DB::table('password_resets')->insert(['email' => $student->email,'token' => Str::random(30),'created_at' => Carbon::now()]);
            $pr = DB::table('password_resets')->where('email',$student->email)->first();
            $url = url('/student/password/reset/'.$pr->token.'?email='.$pr->email);
            Mail::to($pr->email)->send(new ResetPasswordMail($url));
            $email = $pr->email;
            toastr()->success('The Password Reset Email sent to '.$student->email.' Successfully.');
            return view('teachers.auth.passwords.resend',compact('username','email'));
        }
        toastr()->error('The Username Does Not Match Our Record. Try Again !!');
        return redirect()->back();
    }
    
    public function showResetForm(Request $request,$token)
    {
        $pr = DB::table('password_resets')
            ->where('email',$request->email)
            ->where('token',$token)
            ->first();
        if($pr)
        {
            $now = Carbon::now();
            $created = Carbon::parse($pr->created_at);
            $min = $now->diffInMinutes($created);
            if($min < 60)
            {
                $email = $pr->email;
                $token = $pr->token;
                return view('teachers.auth.passwords.reset',compact('email','token'));
            }
            toastr()->error('The Email Link is expired. Try Again !!');
            return redirect(route('teacher.password.forgot'));
        }
        toastr()->error('The Email Link is Invalid. Try Again !!');
        return redirect(route('teacher.password.forgot'));
    }

    public function reset(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);
        $pr = DB::table('password_resets')
            ->where('email',$request->email)
            ->where('token',$request->token)
            ->first();
        if($pr)
        {
            $now = Carbon::now();
            $created = Carbon::parse($pr->created_at);
            $min = $now->diffInMinutes($created);
            if($min < 60)
            {
                Teacher::where('email',$pr->email)->first()->update(['password' => Hash::make($request->new_password)]);
                DB::table('password_resets')->where('email',$pr->email)->delete();
                toastr()->success('Your Password Updated Successfully.');
                return view('teachers.auth.passwords.updated');
            }
            toastr()->error('The Email Link is expired. Try Again !!');
            return redirect(route('teacher.password.forgot'));
        }
        toastr()->error('The Email Link is Invalid. Try Again !!');
        return redirect(route('teacher.password.forgot'));
    }

}
