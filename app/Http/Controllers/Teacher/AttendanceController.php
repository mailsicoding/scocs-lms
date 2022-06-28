<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\AssignClassCourses;
use App\Models\AssignTeacherCourses;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    
    public function attendance()
    {
        $teacher = Auth::guard('teacher')->user();
        $current = AssignTeacherCourses::where('teacher_id',$teacher->id)->get();
        return view('teachers.courses.attendance',compact('current'));
    }

    public function attendance_course($id)
    {
        $course = AssignClassCourses::find($id);
        $attendances = Attendance::where('assign_course_id',$course->id)->get();
        return view('teachers.courses.attendance-detail',compact('course','attendances'));
    }
    
    public function attendance_lecture($id)
    {
        $course = AssignClassCourses::find($id);
        $students = $course->students;
        return view('teachers.courses.mark-attendance',compact('course','students'));
    }

    public function attendance_mark(Request $request,$id)
    {
        $request->validate([
            'date' => 'required',
            'present' => 'required',
        ]);
        $course = AssignClassCourses::find($id);
        $attendance = Attendance::create([
            'assign_course_id' => $course->id,
            'lecture' => $course->classes + 1,
            'present' => count($request->present),
            'absent' => count($course->students) - count($request->present),
            'attendance_date' => $request->date,
        ]);
        foreach($request->present as $p)
        {
            LectureAttendance::create([
                'attendance_id' => $attendance->id,
                'student_id' => $p,
                'present' => $p,
            ]);
        }
        $absent = Student::where('class_id',$course->class_id)->whereNotIn('id',$request->present)->pluck('id')->toArray();
        foreach($absent as $a)
        {
            LectureAttendance::create([
                'attendance_id' => $attendance->id,
                'student_id' => $a,
            ]);
        }
        $course->update([
            'classes' => $course->classes + 1,
        ]);
        toastr()->success('Attendance marked successfully.');
        return redirect()->route('teacher.courses.attendance.course',$course->id);
    }

}
