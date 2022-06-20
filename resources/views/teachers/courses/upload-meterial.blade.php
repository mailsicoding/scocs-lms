@extends('teachers.layout.app')

@section('title','Courses')

@section('content')

<div class="container-fluid main-content" style="padding-right: 7px;">

	<div class="row-fluid">
		<div class="span6">
			<h2>Add Course Meterial</h2>
		</div>
	</div>

	<div style="height:20px;"></div>
	<div class="row-fluid">

		<div class="span12" id="content">
			<div class="row-fluid">

				<!-- block -->
				<div class="block">
					<div class="navbar navbar-inner block-header">
						<div class="muted pull-left">Add Course Meterial</div>
					</div>
					<div class="block-content collapse in">
						<!-- <a href="{{ route('teacher.courses.meterial') }}"><i class="icon-arrow-left"></i> Back</a> -->
						<form class="form-horizontal" method="post" action="{{ route('teacher.courses.meterial.upload') }}" enctype="multipart/form-data">
							@csrf
							<div class="control-group">
								<label class="control-label" for="inputPassword">Lecture</label>
								<div class="controls">
									<select name="lecture" class="@error('lecture') is-invalid @enderror">
										<option value="">Select Lecture #</option>
										@for($i=1;$i<=32;$i++)
											<option value="{{$i}}">Lecture {{$i}}</option>
										@endfor
									</select>
									@error('lecture')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
								</div>
                            </div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Course Name</label>
								<div class="controls">
									<select name="course_name" class="@error('course_name') is-invalid @enderror">
										<option value="">Select Course Name</option>
										@foreach($courses as $course)
											<option value="{{ $course->assignCourse->id }}">{{ $course->assignCourse->course->course_title }}</option>
										@endforeach
									</select>
									@error('lecture')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
								</div>
                            </div>
							<div class="control-group">
								<label class="control-label" for="inputEmail">Title</label>
								<div class="controls">
									<input type="text" value="{{ old('title') }}" name="title" class="span8 @error('title') is-invalid @enderror" id="inputEmail" placeholder="Title">
									@error('title')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
								</div> 
							</div>

							<div class="control-group">
								<label class="control-label" for="inputEmail">File</label>
								<div class="controls">
									<input type="file" value="{{ old('file') }}" name="file" class="span8 @error('file') is-invalid @enderror" id="inputEmail" placeholder="Course Code">
									@error('file')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
								</div> 
							</div>	

							<div class="control-group">
								<div class="controls">

									<button type="submit" class="btn btn-info"><i class="icon-save"></i>
										Save</button>
								</div>
							</div>
						</form>

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
