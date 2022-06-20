@extends('teachers.layout.app')

@section('title','Dashboard')
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
			<h2>Dashboard</h2>
		</div>
	</div>

	<div style="height:20px;"></div>
	<div class="row-fluid">

		<div class="span12" id="content">
			<div class="row-fluid">

				<!-- block -->
				<div class="block">
					<div class="navbar navbar-inner block-header">
						<div class="muted pull-left">Dashboard</div>
					</div>
					<div class="block-content collapse in">
                        <div class="row-fluid">
                            <div class="span6">
                                <form class="form-horizontal p-5" enctype="multipart/form-data" action="{{ route('teacher.image.update') }}" method="post">
                                    @csrf
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail"><b style="font-weight: 900;">Profile Image</b></label>
                                        <div class="controls">
                                            <img src="{{ asset($teacher->image) }}" id="image" alt="" style="width:80px;height:80px;"><br>
                                            <input type="file" onchange="document.querySelector('#update-btn').style.display = 'block';document.querySelector('#image').src = window.URL.createObjectURL(this.files[0]);" value="Course Code" name="profile_image" class="@error('profile_image') is-invalid @enderror" id="inputEmail" placeholder="Course Code">
                                            @error('profile_image')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                            <div id="update-btn" style="display: none;">
                                                <button type="submit" class="btn btn-success">Update</button>
                                            </div>
                                        
                                        </div> 
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail"><b style="font-weight: 900;">Name</b></label>
                                        <div class="controls">
                                            <label class="control-label">{{ $teacher->first_name.' '.$teacher->last_name }}</label>
                                        </div> 
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail"><b style="font-weight: 900;">Username</b></label>
                                        <div class="controls">
                                            <label class="control-label">{{ $teacher->username }}</label>
                                        </div> 
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail"><b style="font-weight: 900;">Email</b></label>
                                        <div class="controls">
                                            <label class="control-label">{{ $teacher->email }}</label>
                                        </div> 
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="inputEmail"><b style="font-weight: 900;">Phone</b></label>
                                        <div class="controls">
                                            <label class="control-label">{{ $teacher->phone_number }}</label>
                                        </div> 
                                    </div>
                                </form>
                            </div>
                            <div class="span6">
                                <form method="post" action="{{ route('teacher.password.update') }}">
                                    @csrf
                                    <div class="control-group">
                                        <div class="controls">
                                            <label for="">Old Password</label>
                                            <input class="input focused @error('old_password') is-invalid @enderror @if(Session::has('error')) is-invalid @endif"
                                                id="focusedInput" name="old_password" type="password" placeholder="Old Password"
                                                value="">
                                            @error('old_password')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                            @if(Session::has('error'))
                                            <div class="invalid-feedback">
                                                {{ Session::get('error') }}
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="controls">
                                            <label for="">New Password</label>
                                            <input class="input focused @error('new_password') is-invalid @enderror"
                                                id="focusedInput" name="new_password" type="password"
                                                placeholder="New Password" value="">
                                            @error('new_password')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn btn-info">Update</button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
					</div>
				</div>
				<!-- /block -->
			</div>
		</div>
	</div>


</div>

@endsection
