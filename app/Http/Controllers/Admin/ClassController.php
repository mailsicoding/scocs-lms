<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Classes;
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
        $classes = Classes::all();
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
            'no_of_students' => 'required|numeric',
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
        $classes = Classes::all();
        $class = Classes::find($id);
        return view('admins.classes.edit',compact('classes','class'));
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
            'no_of_students' => 'required|numeric',
        ]);
        Classes::find($id)->update($request->all());
        toastr()->success('The Class '.$request->class_name.' updated successfully.');
        return redirect()->route('class.index');
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
        return redirect()->route('class.index');
    }
}
