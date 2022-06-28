@extends('teachers.layout.app')

@section('title','Messages')
@section('css')
<style>
.form-horizontal .control-label {
    text-align: left!important;
}
</style>
@endsection

@section('content')

<div class="container-fluid main-content" style="padding-right: 7px;">

	<div class="row-fluid">
		<div class="span6">
			<h2>Messages</h2>
		</div>
	</div>

	<div style="height:20px;"></div>
	<div class="row-fluid">

		<div class="span12" id="content">
			<div class="row-fluid">

				<!-- block -->
				<div class="block">
					<div class="navbar navbar-inner block-header">
						<div class="muted pull-left">Messages</div>
					</div>
					<div class="block-content collapse in">
                        <div class="row-fluid">
                        <form method="post" action="{{route('teacher.messages')}}"> @csrf
                        <div class="control-group">
								<label class="control-label" for="inputPassword">Class Name</label>
								<div class="controls">
									<select required name="class_name" class="chzn-select @error('class_name') is-invalid @enderror">
										<option value="">Select Class Name</option>
										@foreach($classes as $class)
                                            <option value="{{$class->id}}">{{ $class->class_name }} ( {{ $class->session_year }} )</option>
                                        @endforeach
									</select>
                                        @error('class_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
								</div>
							</div>
                            
                            <div class="control-group">
                                    <div class="controls">
                                        <label for="">Message</label>
                                        <textarea class="input focused"
                                            name="message"
                                            placeholder="Message . ." required></textarea>
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
	</div>


</div>

@endsection
