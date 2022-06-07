<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $classes = Classes::all();
        return view('admins.students.all',compact('students','classes'));
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
        $input = $request->all();
        $request->validate([
            'class_name' => 'required|integer',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|unique:students|email',
            'phone_number' => 'required|unique:students|numeric',
            'cnic_number' => 'required|unique:students|numeric',
            'date_of_birth' => 'required|date',
        ]);
        $class = Classes::find($input['class_name']);
        $students = count(Student::where('class_id',$input['class_name'])->get());
        $roll_no = $this->username($input['class_name'],$students+1);
        $input['username'] = $class->session_year.'-SCOCS-'.$class->class_name.'-'.$roll_no;
        $input['class_id'] = $input['class_name'];
        $input['roll_no'] = $roll_no;
        unset($input['class_name']);
        $input['password'] = Hash::make(Str::random(8));
        // dd($input);
        $student = Student::create($input);
        $name = $student->first_name.' '.$student->last_name;
        toastr()->success('The Student '.$name.' created successfully.');
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
        $class = Classes::find($id);
        $students = Student::where('class_id',$class->id)->orderBy('username')->get();
        $student = Student::find($id);
        return view('admins.students.edit',compact('students','student','class'));
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
        $input = $request->all();
        $request->validate([
            'class_name' => 'required|integer',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|unique:students,email,'.$id.'|email',
            'phone_number' => 'required|unique:students,phone_number,'.$id.'|numeric',
            'cnic_number' => 'required|unique:students,cnic_number,'.$id.'|numeric',
            'date_of_birth' => 'required|date',
        ]);
        Student::find($id)->update($input);
        toastr()->success('The Student updated successfully.');
        return redirect()->route('classes.show',$input['class_name']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        toastr()->success('The Student deleted successfully.');
        return redirect()->back();
    }
    public function username($class_id,$count)
    {
        $class = Classes::find($class_id);
        $exist = Student::where('class_id',$class->id)
                        ->where('roll_no', $count)
                        ->first();
        if($exist)
        {
            return $this->username($class->id,$count+1);
        }
        return $count;
    }
}
