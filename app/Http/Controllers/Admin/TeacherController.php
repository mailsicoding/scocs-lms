<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::orderBy('username','ASC')->get();
        return view('admins.teachers.index',compact('teachers'));
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|unique:teachers|email',
            'phone_number' => 'required|unique:teachers|numeric',
        ]);
        $username = $this->username($input['first_name'],$input['last_name'],0);
        $input['username'] = $username;
        $input['password'] = Hash::make(Str::random(8));
        // dd($input);
        $teacher = Teacher::create($input);
        $name = $teacher->first_name.' '.$teacher->last_name;
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
        $teachers = Teacher::orderBy('username','ASC')->get();
        $teacher = Teacher::find($id);
        return view('admins.teachers.edit',compact('teachers','teacher'));
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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|unique:teachers,email,'.$id.'|email',
            'phone_number' => 'required|unique:teachers,phone_number,'.$id.'|numeric',
        ]);
        $teacher = Teacher::find($id);
        if($teacher->first_name == $input['first_name'] && $teacher->last_name == $input['last_name'])
        $input['username'] = $teacher->username;
        else
        {
            $username = $this->username($input['first_name'],$input['last_name'],0);
            $input['username'] = $username;
        }
        $teacher->update($input);
        $name = $teacher->first_name.' '.$teacher->last_name;
        toastr()->success('The Student '.$name.' updated successfully.');
        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        toastr()->success('The Teacher deleted successfully.');
        return redirect()->back();
    }

    public function username($fname,$lname,$count)
    {
        $username = $fname.'.'.$lname.'@scocs.edu.pk';
        if($count > 0)
        $username = $fname.'.'.$lname.$count.'@scocs.edu.pk';
        $exist = Teacher::where('username', $username)
                        ->first();
        if($exist)
        {
            return $this->username($fname,$lname,$count+1);
        }
        return $username;
    }

}
