<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\Admin;
use App\Models\PasswordReset;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
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
        return view('admins.auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['username' => 'required']);
        $username = $request->username;
        $admin = Admin::where('username' , $username)->first();
        if($admin)
        {
            DB::table('password_resets')->where('email',$admin->email)->delete();
            DB::table('password_resets')->insert(['email' => $admin->email,'token' => Str::random(30),'created_at' => Carbon::now()]);
            $pr = DB::table('password_resets')->where('email',$admin->email)->first();
            $url = url('/admin/password/reset/'.$pr->token.'?email='.$pr->email);
            Mail::to($pr->email)->send(new ResetPasswordMail($url));
            $email = $pr->email;
            notify()->success('The Password Reset Email sent to '.$admin->email.' Successfully.');
            return view('admins.auth.passwords.resend',compact('username','email'));
        }
        notify()->error('The Username Does Not Match Our Record. Try Again !!');
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
                return view('admins.auth.passwords.reset',compact('email','token'));
            }
            notify()->error('The Email Link is expired. Try Again !!');
            return redirect(route('admin.password.forgot'));
        }
        notify()->error('The Email Link is Invalid. Try Again !!');
        return redirect(route('admin.password.forgot'));
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
                Admin::where('email',$pr->email)->first()->update(['password' => Hash::make($request->new_password)]);
                DB::table('password_resets')->where('email',$pr->email)->delete();
                notify()->success('Your Password Updated Successfully.');
                return view('admins.auth.passwords.updated');
            }
            notify()->error('The Email Link is expired. Try Again !!');
            return redirect(route('admin.password.forgot'));
        }
        notify()->error('The Email Link is Invalid. Try Again !!');
        return redirect(route('admin.password.forgot'));
    }

}
