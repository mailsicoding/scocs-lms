@extends('students.layout.app')

@section('title','Courses')

@section('content')

<div class="container-fluid main-content" style="padding-right: 7px;">

	<div class="row-fluid">
		<div class="span6">
			<h2>View Course</h2>
		</div>
	</div>

	<div style="height:20px;"></div>

	<div class="row-fluid">

		<div class="span12" id="content">
			<div class="row-fluid">

				<!-- block -->
				<div class="block">
					<div class="navbar navbar-inner block-header">
						<div class="muted pull-left">View Course</div>
					</div>
					<div class="block-content collapse in">
                            <div class="row-fluid">
                                <form class="form-horizontal p-5">
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail"><b style="font-weight: 900;">Course Name</b></label>
                                        <div class="controls">
                                            <label class="control-label" style="width: auto;">{{ $course->course->course_title }}</label>
                                        </div> 
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail"><b style="font-weight: 900;">Class Name</b></label>
                                        <div class="controls">
                                            <label class="control-label" style="width: auto;">{{ $course->class->class_name.' ('.$course->class->session_year.' )' }}</label>
                                        </div> 
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail"><b style="font-weight: 900;">Semester</b></label>
                                        <div class="controls">
                                            <label class="control-label" style="width: auto;">{{ $course->semester->semester_name }}</label>
                                        </div> 
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail"><b style="font-weight: 900;">Lecture Completed</b></label>
                                        <div class="controls">
                                            <label class="control-label" style="width: auto;">{{ $course->classes }}</label>
                                        </div> 
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail"><b style="font-weight: 900;">Course Meterials</b></label>
                                        <div class="controls">
                                            <label class="control-label" style="width: auto;"><a href="{{ route('student.courses.meterial.view',$course->id) }}" class="btn btn-success">View Course Meterials</a></label>
                                        </div> 
                                    </div>
                                </form>
                            </div>
					</div>
				</div>
				<!-- /block -->
			</div>
		</div>
	</div>


</div>

@endsection
@section('scripts')

@endsection
