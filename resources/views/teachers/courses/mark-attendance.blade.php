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
                        
                    <form action="{{ route('teacher.courses.attendance.mark',$course->id) }}" method="post">
                                    @csrf
                            
                        <div class="span12">

                        <div class="control-group">
								<label class="control-label" for="inputEmail">Attendance Date</label>
								<div class="controls">
									<input type="date" value="{{ old('date') }}" name="date" class="span3 @error('date') is-invalid @enderror" id="inputEmail" placeholder="Course Code">
									@error('date')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
								</div> 
							</div>
                            
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Present</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $s)
                                <tr>
                                    <th>{{ $s->first_name.' '.$s->last_name }}</th>
                                    <td>
                                        <div class="controls">
                                            <input type="checkbox" value="{{ $s->id }}" name="present[]">
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                    <div class="control-group">
								<div class="controls">

									<button type="submit" class="btn btn-info"><i class="icon-save"></i>
										Save</button>
								</div>
							</div>
                        </div>
                    </div>
                    <!-- /block -->
                </form>

                </div>
            </div>
        </div>
    </div>


</div>

@endsection
