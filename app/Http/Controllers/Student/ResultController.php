<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignClassCourses;
use App\Models\AssignTeacherCourses;
use App\Models\RegisterCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
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

    
    public function results()
    {
        $teacher = Auth::guard('teacher')->user();
        $current = AssignTeacherCourses::where('teacher_id',$teacher->id)->get();
        return view('teachers.courses.results',compact('current'));
    }

    public function result_course($id)
    {
        $course = AssignClassCourses::find($id);
        $students = $course->students;
        return view('teachers.courses.upload-result',compact('course','students'));
    }

    public function upload_result($id,Request $request)
    {
        $course = AssignClassCourses::find($id);
        $res = RegisterCourse::where('student_id',$request->student_id)->where('assign_course_id',$request->course_id)->first();
        $res->update([
            'score' => $request->score,
            'grade' => $request->grade,
        ]);
        toastr()->success('Result uploaded successfully.');
        return back();
    }
    
    public function view_result()
    {
        $student = Auth::guard('student')->user();
        $courses = RegisterCourse::where('student_id',$student->id)->get();
        return view('students.courses.view-result',compact('courses'));
    }
    
}
