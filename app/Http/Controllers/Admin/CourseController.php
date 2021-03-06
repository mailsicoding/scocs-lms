<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssignClassCourses;
use App\Models\Course;
use App\Models\Semester;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view('admins.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semesters = Semester::all()->except(9);
        return view('admins.courses.create',compact('semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        // dd($input);
        $request->validate([
            'course_code' => 'required|unique:courses',
            'course_title' => 'required|unique:courses',
            'credit_hours' => 'required',
            'description' => 'required',
        ]);
        unset($input['save']);
        Course::create($input);
        toastr()->success('The Course created successfully.');
        return redirect()->route('courses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $semesters = Semester::all()->except(9);
        return view('admins.courses.edit',compact('semesters','course'));
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
        $input = $request->all();
        // dd($input);
        $request->validate([
            'course_code' => 'required|unique:courses,course_code,'.$id,
            'course_title' => 'required|unique:courses,course_title,'.$id,
            'credit_hours' => 'required',
            'description' => 'required',
        ]);
        $input['semester_id'] = $input['semester'];
        unset($input['semester']);
        unset($input['save']);
        Course::find($id)->update($input);
        toastr()->success('The Course updated successfully.');
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        toastr()->success('The Course deleted successfully.');
        return redirect()->back();
    }

    public function assign()
    {
        $allCourses = Course::all();
        $semesters = Semester::all()->except(9);
        $courses = AssignClassCourses::orderBy('semester_id')->get();
        return view('admins.courses.assign',compact('courses','allCourses','semesters','classes'));
    }

    public function assignStore(Request $request)
    {
        $request->validate([
            'course_name' => 'required',
            'semester_name' => 'required',
        ]);
        $exist = AssignClassCourses::where('class_id',$request->class_id)
                            ->where('course_id',$request->course_name)
                            ->where('semester_id',$request->semester_name)->first();
        if($exist)
        {
            toastr()->error('The Course already exists.');
            return redirect()->back();
        }
        AssignClassCourses::create([
            'class_id' => $request->class_id,
            'course_id' => $request->course_name,
            'semester_id' => $request->semester_name,
        ]);
        toastr()->success('The Course added successfully.');
        return redirect()->back();
    }
    
    public function assignDestroy($id)
    {
        $course = AssignClassCourses::find($id);
        $course->delete();
        toastr()->success('The Course deleted successfully.');
        return redirect()->back();
    }
}
