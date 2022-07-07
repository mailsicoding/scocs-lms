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
            <a href="{{ route('teacher.courses.attendance.lecture',$course->id) }}" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Mark Attendance</a>
			<!-- block -->
                <div id="block_bg" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Mark Attendance</div>
                    </div>
                    <div class="block-content collapse in">
                
                        <div class="span12">
                            <table class="table" id="example">
                                <thead>
                                <tr>
                                    <th>Lecture #</th>
                                    <th>Present</th>
                                    <th>Absent</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attendances as $a)
                                    <tr>
                                        <td>{{ $a->lecture }}</td>
                                        <td>{{ $a->present }}</td>
                                        <td>{{ $a->absent }}</td>
                                        <td>{{ $a->attendance_date }}</td>
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
