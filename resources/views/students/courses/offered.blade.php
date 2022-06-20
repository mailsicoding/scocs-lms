@extends('students.layout.app')

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
    <div class="span3" id="adduser">
        <div class="row-fluid">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Assign Class Courses</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form method="post" action="{{ route('student.courses.offered.load') }}">
                            @csrf
                                <input type="hidden" name="class_id" value="{{ $class->id }}">
							<div class="control-group">
								<label class="control-label" for="inputPassword">Semester Name</label>
								<div class="controls">
									<select name="semester_name" class="@error('semester_name') is-invalid @enderror">
										<!-- <option value="">Select Semester Name</option> -->
                                        @foreach($semesters as $key => $semester)
										    <option value="{{ $semester->id }}"
                                            @if ($key == count($semesters) - 1) 
                                                selected
                                            @endif
                                            >{{ $semester->semester_name }}</option>
                                        @endforeach
									</select>
								</div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="btn btn-info">Load Courses</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /block -->
        </div>

    </div>
    <div class="span9" id="">
        <div class="row-fluid">
            <!-- block -->
            <div id="block_bg" class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Assign Courses</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Class Name</th>
                                    <th>Course Name</th>
                                    <th>Semester Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $course)
                                <tr>
                                    <td width="30px">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td width="@php echo 100/3; @endphp%">{{ $class->class_name }}</td>
                                    <td width="@php echo 100/3; @endphp%">{{ $course->course->course_title }}</td>
                                    <td width="70px">{{ $course->semester->semester_name }}</td>

                                    <td width="@php echo 100/2; @endphp%">
                                        @if(in_array($course->id,$registered))
                                        <a href="{{ route('student.courses.offered.unregister',$course->id) }}" style="margin-top:10px" class="btn btn-danger">
                                        Un Register
                                        </a>
                                        @else
                                        <a href="{{ route('student.courses.offered.register',$course->id) }}" style="margin-top:10px" class="btn btn-success">
                                        Register
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /block -->
        </div>


    </div>
</div>


</div>

@endsection

