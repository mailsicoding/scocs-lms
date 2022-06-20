<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\AssignClassCourses;
use App\Models\AssignTeacherCourses;
use App\Models\Course;
use App\Models\CourseMeterial;
use App\Models\RegisterCourse;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function current()
    {
        $student = Auth::guard('student')->user();
        $current = RegisterCourse::where('student_id',$student->id)->where('grade','RNU')->with('assignCourse')->get();
        return view('students.courses.current',compact('current'));
    }

    public function offered()
    {
        $student = Auth::guard('student')->user();
        $class = Classes::find($student->class_id);
        $sems = explode(',',$class->allow_semester);
        $semesters = Semester::whereIn('id',$sems)->get();
        $courses = AssignClassCourses::where('class_id',$student->class_id)
        ->where('semester_id',$sems[count($sems) - 1])->get();
        $registered = RegisterCourse::get()->pluck('assign_course_id')->toArray();
        return view('students.courses.offered',compact('courses','registered','semesters','class'));
    }
    
    public function offeredLoad(Request $request)
    {
        $student = Auth::guard('student')->user();
        $class = Classes::find($student->class_id);
        $sems = explode(',',$class->allow_semester);
        $semesters = Semester::whereIn('id',$sems)->get();
        $courses = AssignClassCourses::where('class_id',$student->class_id)
        ->where('semester_id',$request->semester_name)->get();
        $registered = RegisterCourse::get()->pluck('assign_course_id')->toArray();
        return view('students.courses.offered',compact('courses','registered','semesters','class'));
    }
    
    public function view($id)
    {
        $student = Auth::guard('student')->user();
        $course = AssignClassCourses::find($id);
        return view('students.courses.view',compact('course'));
    }

    public function offeredRegister($id)
    {
        $student = Auth::guard('student')->user();
        $course = AssignClassCourses::find($id);
        RegisterCourse::create([
            'student_id' => $student->id,
            'assign_course_id' => $course->id,
        ]);
        toastr()->success('Course registered successfully.');
        return redirect()->back();
    }

    public function offeredUnRegister($id)
    {
        $student = Auth::guard('student')->user();
        $course = RegisterCourse::where('assign_course_id',$id)->where('student_id',$student->id)->first();
        $course->delete();
        toastr()->success('Course unregistered successfully.');
        return redirect()->back();
    }
    
    public function meterial()
    {
        $student = Auth::guard('student')->user();
        $current = AssignClassCourses::where('class_id',$student->class_id)->orderBy('semester_id','DESC')->get();
        return view('students.courses.meterial',compact('current'));
    }
    
    public function meterialView($id)
    {
        $course = AssignClassCourses::find($id);
        $files = CourseMeterial::where('assign_course_id',$course->id)->select(['lecture','title','file'])->orderBy('lecture','DESC')->get();
        return view('students.courses.view-meterial',compact('files'));
    }
}
