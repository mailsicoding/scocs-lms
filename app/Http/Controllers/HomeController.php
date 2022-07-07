<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function admin()
    {   
        $data = [
            'classes' => count(Classes::all()),
            'students' => count(Student::all()),
            'teachers' => count(Teacher::all()),
            'courses' => count(Course::all()),
        ];
        return view('admins.dashboard.index',$data);
    }

    public function teacher()
    {   
        $teacher = Auth::guard('teacher')->user(); 
        return view('teachers.dashboard.index',compact('teacher'));
    }

    public function student()
    {
        $student = Auth::guard('student')->user();   
        return view('students.dashboard.index',compact('student'));
    }

    public function student_image_update(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image'
        ]);
        $student = Auth::guard('student')->user();
        $img = $request->file('profile_image');
        $name = time().'-'.$img->getClientOriginalName();   
        $img->move(public_path('images'),$name);
        $path = 'images/'.$name;
        $student->update(['image' => $path]);
        toastr()->success('Profile Image Updated Successfully.');
        return redirect()->back();
    }

    public function student_password_update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ]);
        $student = Auth::guard('student')->user();
        if(!Hash::check($request->old_password,$student->password))
        {
            return back()->with('error','Please enter correct old password');
        }
        $student->update(['password' => Hash::make($request->new_password)]);
        toastr()->success('Password Updated Successfully.');
        return redirect()->back();
    }
    
    public function teacher_image_update(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image'
        ]);
        $teacher = Auth::guard('teacher')->user();
        $img = $request->file('profile_image');
        $name = time().'-'.$img->getClientOriginalName();   
        $img->move(public_path('images'),$name);
        $path = 'images/'.$name;
        $teacher->update(['image' => $path]);
        toastr()->success('Profile Image Updated Successfully.');
        return redirect()->back();
    }

    public function teacher_password_update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8',
        ]);
        $teacher = Auth::guard('teacher')->user();
        if(!Hash::check($request->old_password,$teacher->password))
        {
            return back()->with('error','Please enter correct old password');
        }
        $teacher->update(['password' => Hash::make($request->new_password)]);
        toastr()->success('Password Updated Successfully.');
        return redirect()->back();
    }
}
