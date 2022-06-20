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
                        <form class="form-horizontal p-5" enctype="multipart/form-data" action="{{ route('teacher.image.update') }}" method="post">
                                    @csrf
                            <div class="control-group">
                                <label class="control-label" for="inputEmail"><b style="font-weight: 900;">Lecture #no</b></label>
                                
								<div class="controls">
									<select name="lecture_no" class="span6 @error('lecture_no') is-invalid @enderror">
										<option value="">Select Lecture No</option>
										@for($i=1;$i<=32;$i++)
											<option value="{{$i}}">Lecture {{$i}}</option>
										@endfor
									</select>
                                        @error('lecture_no')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    <div style="margin-top: 10px;">
                                        <button type="submit" class="btn btn-success">Select</button>
                                    </div>

							    </div>
                            </div>
                        </form>
                        </div>
                        <div class="span12">
                            <div class="span1">
                                Name : Kamran Waris
                                Roll No : 12
                                Name : Kamran Waris
                            </div>
                        </div>
                    </div>
                    <!-- /block -->

                </div>
            </div>
        </div>
    </div>


</div>

@endsection
