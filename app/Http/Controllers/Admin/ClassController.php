<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\AssignClassCourses;
use App\Models\Course;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::orderBy('session_year','asc')->get();
        return view('admins.classes.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'class_name' => 'required|unique:classes|string',
            'session_year' => 'required|numeric|unique:classes',
        ]);
        Classes::create($request->all());
        toastr()->success('The Class '.$request->class_name.' created successfully.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $students = Student::where('class_id',$id)->orderBy('username')->get();
        $class = Classes::find($id);
        return view('admins.students.index',compact('students','class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allCourses = Course::all();
        $semesters = Semester::all()->except(9);
        $courses = AssignClassCourses::orderBy('semester_id')->get();
        $classes = Classes::orderBy('session_year','asc')->get();
        $class = Classes::find($id);
        return view('admins.classes.edit',compact('courses','allCourses','semesters','classes','class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'class_name' => 'required|string|unique:classes,class_name,'.$id,
            'session_year' => 'required|numeric|unique:classes,session_year,'.$id,
            'current_semester' => 'required',
            'allow_semester' => 'required',
        ]);
        $inputs = $request->all();
        $inputs['allow_semester'] = implode(',',$inputs['allow_semester']);
        $class = Classes::find($id);
        $class->update($inputs);
        toastr()->success('The Class '.$request->class_name.' updated successfully.');
        return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Classes::find($id);
        $className = $class->class_name;
        $class->delete();
        toastr()->success('The Class '.$className.' deleted successfully.');
        return redirect()->route('classes.index');
    }
}
