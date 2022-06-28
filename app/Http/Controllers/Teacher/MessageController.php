<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Mail\MessageMail;
use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index()
    {
        $classes = Classes::all();
        return view('teachers.messages.index',compact('classes'));
    }

    public function teacher_message_send(Request $request)
    {
        $m = $request->message;
        $teacher = Auth::guard('teacher')->user();
        $sender = $teacher->first_name.' '.$teacher->last_name;
        $class = Classes::find($request->class_name);
        foreach($class->students as $s)
        {
            Mail::to($s->email)->send(new MessageMail($sender,$m));
        }
        toastr()->success('Message sent successfully.');
        return back();
    }

    public function messages()
    {
        $teachers = Teacher::all();
        return view('students.messages.index',compact('teachers'));
    }

    public function student_message_send(Request $request)
    {
        $student = Auth::guard('student')->user();
        $sender = $student->first_name.' '.$student->last_name;
        $teacher = Teacher::find($request->teacher);
        Mail::to($teacher->email)->send(new MessageMail($sender,$request->message));
        toastr()->success('Message sent successfully.');
        return back();
    }

}
