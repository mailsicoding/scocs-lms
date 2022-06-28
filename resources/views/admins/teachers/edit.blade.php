@extends('admins.layout.app')

@section('title','Teachers')

@section('content')

<div class="container-fluid main-content">

    <div class="row-fluid">
        <div class="span6">
            <h2>Teachers</h2>
        </div>
    </div>
    <div style="height:20px;"></div>

    <div class="row-fluid">
        <div class="span3" id="adduser">
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Edit Teacher</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form method="post" action="{{ route('teachers.update',$teacher->id) }}">
                                @csrf
                                @method('put')
                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">First Name</label>
                                        <input class="input focused @error('first_name') is-invalid @enderror"
                                            id="focusedInput" value="{{ $teacher->first_name }}" name="first_name" type="text" placeholder="First Name"
                                            >
                                        @error('first_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">Last Name</label>
                                        <input class="input focused @error('last_name') is-invalid @enderror"
                                            id="focusedInput" name="last_name" type="text" placeholder="Last Name"
                                            value="{{ $teacher->last_name }}">
                                        @error('last_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">Email</label>
                                        <input class="input focused @error('email') is-invalid @enderror"
                                            id="focusedInput" name="email" type="email" placeholder="Email"  value="{{ $teacher->email }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">Phone Number</label>
                                        <input class="input focused @error('phone_number') is-invalid @enderror"
                                            id="focusedInput" name="phone_number" type="number"
                                            placeholder="Phone Number" value="{{ $teacher->phone_number }}">
                                        @error('phone_number')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
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
                        <div class="muted pull-left">Course List</div>
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
                                        <td>
                                        @php $cls = route('courses.teacher.assign.delete',$teacher->id); @endphp
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

<div style="height:20px"></div>

<div class="container-fluid main-content">

    <div class="row-fluid">
        <div class="span6">
            <h2>Assign Teacher Courses</h2>
        </div>
    </div>
    <div style="height:20px;"></div>

    <div class="row-fluid">
        <div class="span12" id="">
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
                                        <td width="@php echo 100/4; @endphp%">{{ $course->class->class_name }}</td>
                                        <td width="@php echo 100/4; @endphp%">{{ $course->course->course_title }}</td>
                                        <td width="@php echo 100/4; @endphp%">{{ $course->semester->semester_name }}
                                        </td>

                                        <td width="@php echo 100/4; @endphp%">
                                            @php $cls = route('courses.teacher.assign',[$course->id,$teacher->id]);
                                            $text = 'assign course to '.$teacher->first_name.' '.$teacher->last_name;
                                             @endphp
                                             @if(!in_array($course->id,$assigned))
                                            <a data-toggle="modal" href="#class_verify" style="margin-top:10px"
                                                id="verify" class="btn btn-success"
                                                onclick="verify_record('{{ $cls }}','Assign Course','{{ $text }}')">Assign Course</a>
                                            @else<a href="#" style="margin-top:10px"
                                                 class="btn btn-danger"
                                                >Already Assigned</i></a>
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
@section('scripts')
<script>
    $(document).ready(() => {
        $('#example2').dataTable();
    })

</script>
@endsection
