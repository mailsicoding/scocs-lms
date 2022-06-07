<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $courses = Course::orderBy('semester_id','ASC')->get();
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
            'semester' => 'required',
            'credit_hours' => 'required',
            'description' => 'required',
        ]);
        $input['semester_id'] = $input['semester'];
        unset($input['semester']);
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
            'semester' => 'required',
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
}
