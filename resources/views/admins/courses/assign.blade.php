@extends('admins.layout.app')

@section('title','Classes')

@section('content')

<div class="container-fluid main-content">

    <div class="row-fluid">
        <div class="span6">
            <h2>Assign Class Courses</h2>
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
                            <form method="post" action="{{ route('courses.class.assign') }}">
                                @csrf
                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">Class Name</label>
                                        <input class="input focused @error('class_name') is-invalid @enderror"
                                            id="focusedInput" name="class_name" type="text" placeholder="Class Name"
                                            value="">
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
                                            placeholder="Session Year" value="">
                                        @error('session_year')
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
                                        <td width="@php echo 100/4; @endphp%">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td width="@php echo 100/4; @endphp%">{{ $course }}</td>
                                        <td width="@php echo 100/4; @endphp%">{{ $course }}</td>
                                        <td width="@php echo 100/4; @endphp%">{{ $course }}</td>

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
