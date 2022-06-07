<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\Student;
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
        return view('students.auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['username' => 'required']);
        $username = $request->username;
        $student = Student::where('username' , $username)->first();
        if($student)
        {
            $email = $student->email;
            $token = Str::random(30);
            DB::table('password_resets')->where('email',$email)->delete();
            $url = url('/student/password/reset/'.$token.'?email='.$email);
            DB::table('password_resets')->insert(['email' => $email,'token' => $token,'url' => $url,'created_at' => Carbon::now()]);
            Mail::to($email)->send(new ResetPasswordMail($url));
            toastr()->success('The Password Reset Email sent to '.$email.' Successfully.');
            return view('students.auth.passwords.resend',compact('username','email'));
        }
        toastr()->error('The Username Does Not Match Our Record. Try Again !!');
        return redirect()->back();
    }
    
    public function showResetForm(Request $request,$token)
    {
        $url = $request->url();
        $pr = DB::table('password_resets')
            ->where('email',$request->email)
            ->where('token',$token)
            ->where('url',$url)
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
                return view('students.auth.passwords.reset',compact('email','token'));
            }
            toastr()->error('The Email Link is expired. Try Again !!');
            return redirect(route('students.password.forgot'));
        }
        toastr()->error('The Email Link is Invalid. Try Again !!');
        return redirect(route('students.password.forgot'));
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
                Student::where('email',$pr->email)->first()->update(['password' => Hash::make($request->new_password)]);
                DB::table('password_resets')->where('email',$pr->email)->delete();
                toastr()->success('Your Password Updated Successfully.');
                return view('admins.auth.passwords.updated');
            }
            toastr()->error('The Email Link is expired. Try Again !!');
            return redirect(route('students.password.forgot'));
        }
        toastr()->error('The Email Link is Invalid. Try Again !!');
        return redirect(route('students.password.forgot'));
    }

}
