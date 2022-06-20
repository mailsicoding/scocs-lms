@extends('teachers.layout.app')

@section('title','Courses')

@section('content')

<div class="container-fluid main-content">

    <div class="row-fluid">
        <div class="span6">
            <h2>Current Courses</h2>
        </div>
    </div>
    <div style="height:20px;"></div>

    <div class="row-fluid">
        <!--/span-->
        <div class="span12" id="content">
            <div class="row-fluid"></div>

            <div class="row-fluid">

                <!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Current Courses</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                                <table class="table" id="example">
                                    <thead>
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($current as $course)
                                    <tr>
                                        <th>{{ $course->assignCourse->course->course_title }}</th>
                                        <td><a href="{{ route('teacher.courses.attendance.course',$course->id) }}" class="btn btn-info">view course</a></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <!-- /block -->

                </div>
            </div>
        </div>
    </div>


</div>

@endsection
