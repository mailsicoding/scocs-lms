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
                        <div class="muted pull-left">Mark Attendance</div>
                    </div>
                    <div class="block-content collapse in">
                        
                        <div class="span12">
                            
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Score</th>
                                    <th>Grade</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $s)
                                <tr>
                                    @php $reg = $s->register_course($s->id,$course->id); @endphp
                                    <th>{{ $s->first_name.' '.$s->last_name }}</th>
                                    <td>
                                        @if(!empty($reg))
                                        {{$reg->score}}
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($reg))
                                        {{$reg->grade}}
                                        @else
                                        Course Not Registered By the Student
                                        @endif
                                    </td>
                                    <td>
                                    @if(!empty($reg))
                                        <a data-target="#upload_course" data-toggle="modal" onclick="upload_result('{{$s->id}}','{{$reg->score}}','{{$reg->grade}}')" type="submit" class="btn btn-info"><i class="icon-save"></i>
										Upload</a>
                                        @endif
                                    </td>
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

@include('teachers.courses.upload_course_modal')

@endsection
@section('scripts')
<script>
    
    function upload_result(id,score,grade)
    {
        $('#student_id').val(id);
        $('#score').val(score);
        $('#grade').val(grade);
    }
</script>
@endsection