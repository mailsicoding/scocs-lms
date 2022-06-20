<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\AssignClassCourses;
use App\Models\AssignTeacherCourses;
use App\Models\Attendance;
use App\Models\CourseMeterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\map;

class CourseController extends Controller
{
    public function current()
    {
        $teacher = Auth::guard('teacher')->user();
        $current = AssignTeacherCourses::where('teacher_id',$teacher->id)->get();
        return view('teachers.courses.current',compact('current'));
    }
    
    public function view($id)
    {
        $teacher = Auth::guard('teacher')->user();
        $course = AssignTeacherCourses::find($id);
        return view('teachers.courses.view',compact('course'));
    }

    public function meterial()
    {
        $teacher = Auth::guard('teacher')->user();
        $current = AssignTeacherCourses::where('teacher_id',$teacher->id)->get();
        return view('teachers.courses.meterial',compact('current'));
    }
    
    public function meterialView($id)
    {
        $course = AssignClassCourses::find($id);
        $files = CourseMeterial::where('assign_course_id',$course->id)->select(['lecture','title','file'])->orderBy('lecture','DESC')->get();
        return view('teachers.courses.view-meterial',compact('files'));
    }

    public function uploadMeterial()
    {
        $teacher = Auth::guard('teacher')->user();
        $courses = AssignTeacherCourses::where('teacher_id',$teacher->id)->get();
        return view('teachers.courses.upload-meterial',compact('courses'));
    }

    public function uploadedMeterial(Request $request)
    {
        $request->validate([
            'lecture' => 'required',
            'course_name' => 'required',
            'title' => 'required',
            'file' => 'required',
        ]);
        $img = $request->file('file');
        $name = 'Lecture-'.$request->lecture.'-'.str_replace(' ','-',$request->title).'-'.date('d-M-Y',time()).'.'.$img->extension();   
        $img->move(public_path('Course-Meterial'),$name);
        $path = url('/').'/Course-Meterial/'.$name;
        CourseMeterial::create([
            'lecture' => $request->lecture,
            'assign_course_id' => $request->course_name,
            'title' => $request->title,
            'file' => $path,
        ]);
        toastr()->success('Course Meterial Uploaded Successfully.');
        return redirect()->back();
    }
    
    public function attendance()
    {
        $teacher = Auth::guard('teacher')->user();
        $current = AssignTeacherCourses::where('teacher_id',$teacher->id)->get();
        return view('teachers.courses.attendance',compact('current'));
    }

    public function attendance_course($id)
    {
        $course = AssignClassCourses::find($id);
        // Attendance::
        return view('teachers.courses.mark-attendance');
    }

}
