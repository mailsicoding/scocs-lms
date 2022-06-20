@extends('admins.layout.app')

@section('title','Classes')

@section('content')

<div class="container-fluid main-content">

    <div class="row-fluid">
        <div class="span6">
            <h2>Classes</h2>
        </div>
    </div>
    <div style="height:20px;"></div>

    <div class="row-fluid">
        <div class="span3" id="adduser">
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Add Class</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form method="post" action="{{ route('classes.update',$class->id) }}">
                                @csrf
                                @method('put')
                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">Class Name</label>
                                        <input class="input focused @error('class_name') is-invalid @enderror"
                                            id="focusedInput" name="class_name" type="text" placeholder="Class Name"
                                            value="{{ $class->class_name }}">
                                        @error('class_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">Session Year</label>
                                        <input class="input focused @error('session_year') is-invalid @enderror"
                                            id="focusedInput" name="session_year" type="number"
                                            placeholder="No Of Students" value="{{ $class->session_year }}">
                                        @error('session_year')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>


                                
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
                        <div class="muted pull-left">Class List</div>
                    </div>
                    <div class="block-content collapse in">
                            <div class="span12">
                                <div class="span6">
                                    <div class="form-horizontal">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail"><b>Current
                                                    Semester</b></label>
                                            <div class="controls">
                                            @error('current_semester')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">1st</label>
                                            <div class="controls">
                                                <input type="radio" value="1" name="current_semester" @if($class->current_semester == 1) checked @endif>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">2nd</label>
                                            <div class="controls">
                                                <input type="radio" value="2" name="current_semester" @if($class->current_semester == 2) checked @endif>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">3rd</label>
                                            <div class="controls">
                                                <input type="radio" value="3" name="current_semester" @if($class->current_semester == 3) checked @endif>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">4th</label>
                                            <div class="controls">
                                                <input type="radio" value="4" name="current_semester" @if($class->current_semester == 4) checked @endif>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">5th</label>
                                            <div class="controls">
                                                <input type="radio" value="5" name="current_semester" @if($class->current_semester == 5) checked @endif>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">6th</label>
                                            <div class="controls">
                                                <input type="radio" value="6" name="current_semester" @if($class->current_semester == 6) checked @endif>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">7th</label>
                                            <div class="controls">
                                                <input type="radio" value="7" name="current_semester" @if($class->current_semester == 7) checked @endif>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">8th</label>
                                            <div class="controls">
                                                <input type="radio" value="8" name="current_semester" @if($class->current_semester == 8) checked @endif>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="form-horizontal">
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail"><b>Allow
                                                    Registration</b></label>
                                            <div class="controls">
                                              @error('allow_semester')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        @php
                                        $allow = explode(',',$class->allow_semester)
                                        @endphp
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">1st</label>
                                            <div class="controls">
                                                <input type="checkbox" value="1" @if(in_array(1,$allow)) checked @endif @if(in_array(1,$allow)) checked @endif name="allow_semester[]">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">2nd</label>
                                            <div class="controls">
                                                <input type="checkbox" value="2" @if(in_array(2,$allow)) checked @endif name="allow_semester[]">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">3rd</label>
                                            <div class="controls">
                                                <input type="checkbox" value="3" @if(in_array(3,$allow)) checked @endif name="allow_semester[]">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">4th</label>
                                            <div class="controls">
                                                <input type="checkbox" value="4" @if(in_array(4,$allow)) checked @endif name="allow_semester[]">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">5th</label>
                                            <div class="controls">
                                                <input type="checkbox" value="5" @if(in_array(5,$allow)) checked @endif name="allow_semester[]">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">6th</label>
                                            <div class="controls">
                                                <input type="checkbox" value="6" @if(in_array(6,$allow)) checked @endif name="allow_semester[]">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">7th</label>
                                            <div class="controls">
                                                <input type="checkbox" value="7" @if(in_array(7,$allow)) checked @endif name="allow_semester[]">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="inputEmail">8th</label>
                                            <div class="controls">
                                                <input type="checkbox" value="8" @if(in_array(8,$allow)) checked @endif name="allow_semester[]">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group" style="text-align: center;">
                                    <div class="controls">

                                        <button type="submit" class="btn btn-info"><i class="icon-save"></i>
                                            Save Changes</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- /block -->
            </div>


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
                            <form method="post" action="{{ route('courses.assign') }}">
                                @csrf
                                <input type="hidden" name="class_id" value="{{ $class->id }}">
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Course Name</label>
                                    <div class="controls">
                                        <select name="course_name" class="@error('course_name') is-invalid @enderror">
                                            <option value="">Select Course Name</option>
                                            @foreach($allCourses as $course)
                                            <option value="{{ $course->id }}">{{ $course->course_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="inputPassword">Semester Name</label>
                                    <div class="controls">
                                        <select name="semester_name"
                                            class="@error('semester_name') is-invalid @enderror">
                                            <option value="">Select Semester Name</option>
                                            @foreach($semesters as $semester)
                                            <option value="{{ $semester->id }}">{{ $semester->semester_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn btn-info"><i
                                                class="icon-plus-sign icon-large"></i></button>

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
                            <table cellpadding="0" cellspacing="0" border="0" class="table" id="example2">
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
                                        <td width="@php echo 100/4; @endphp%">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td width="@php echo 100/4; @endphp%">{{ $class->class_name }}</td>
                                        <td width="@php echo 100/4; @endphp%">{{ $course->course->course_title }}</td>
                                        <td width="@php echo 100/4; @endphp%">{{ $course->semester->semester_name }}
                                        </td>

                                        <td width="@php echo 100/4; @endphp%">
                                            @php $cls = route('courses.assign.destroy',$course->id); @endphp
                                            <a data-toggle="modal" href="#class_delete" style="margin-top:10px"
                                                id="delete" class="btn btn-danger"
                                                onclick="delete_record('{{ $cls }}','Delete Assigned Course','assigned course')"><i
                                                    class="icon-trash icon-large"></i></a>
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
@section('scripts')
<script>
    $(document).ready(() => {
        $('#example2').dataTable();
    })

</script>
@endsection
