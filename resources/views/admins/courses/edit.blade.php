@extends('admins.layout.app')

@section('title','Courses')

@section('content')

<div class="container-fluid main-content" style="padding-right: 7px;">

	<div class="row-fluid">
		<div class="span6">
			<h2>Edit Course</h2>
		</div>
	</div>

	<div style="height:20px;"></div>
	<div class="row-fluid">

		<div class="span12" id="content">
			<div class="row-fluid">

				<!-- block -->
				<div class="block">
					<div class="navbar navbar-inner block-header">
						<div class="muted pull-left">Edit Course</div>
					</div>
					<div class="block-content collapse in">
						<a href="{{ route('courses.index') }}"><i class="icon-arrow-left"></i> Back</a>
						<form class="form-horizontal" method="post" action="{{ route('courses.update',$course->id) }}">
							@csrf
                            @method('put')
							<div class="control-group">
								<label class="control-label" for="inputEmail">Course Code</label>
								<div class="controls">
									<input type="text" name="course_code" value="{{ $course->course_code }}" class="span8 @error('course_code') is-invalid @enderror" id="inputEmail" placeholder="Course Code">
									@error('course_code')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
								</div> 
							</div>
							
							<div class="control-group">
								<label class="control-label" for="inputPassword">Course Title</label>
								<div class="controls">
									<input type="text" value="{{ $course->course_title }}" class="span8 @error('course_title') is-invalid @enderror" name="course_title" id="inputPassword"
										placeholder="course Title">
									@error('course_title')
									<div class="invalid-feedback">
										{{$message}}
									</div>
									@enderror
								</div>
							</div>
							<div class="control-group">
								<label class="control-label" for="inputPassword">Credit Hours</label>
								<div class="controls">
									<input type="number" value="{{ $course->credit_hours }}" class="span1 @error('credit_hours') is-invalid @enderror" name="credit_hours" id="inputPassword">
									@error('credit_hours')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="inputPassword">Description</label>
								<div class="controls">
									<textarea name="description" id="ckeditor_full" class="@error('description') is-invalid @enderror">{{ $course->description }}</textarea>
									@error('description')
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
