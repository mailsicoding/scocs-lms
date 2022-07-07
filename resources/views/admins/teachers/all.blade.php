@extends('admins.layout.app')

@section('title','Teachers')

@section('content')

<div class="container-fluid main-content">

    <div class="row-fluid">
        <div class="span6">
            <h2>Students</h2>
        </div>
    </div>
    <div style="height:20px;"></div>

    <div class="row-fluid">
        <div class="span3" id="adduser">
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Add Student</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form method="post" action="{{ route('students.store') }}">
                                @csrf
							<div class="control-group">
								<label class="control-label" for="inputPassword">Class Name</label>
								<div class="controls">
									<select name="class_name" class="chzn-select @error('class_name') is-invalid @enderror">
										<option value="">Select Class Name</option>
										@foreach($classes as $class)
                                            <option value="{{$class->id}}" @if(old('class_name') == $class->id) selected @endif>{{ $class->class_name }} ( {{ $class->session_year }} )</option>
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
                                        <label for="">First Name</label>
                                        <input class="input focused @error('first_name') is-invalid @enderror"
                                            id="focusedInput" value="{{ old('first_name') }}" name="first_name" type="text" placeholder="First Name"
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
                                            value="{{ old('last_name') }}">
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
                                            id="focusedInput" name="email" type="email" placeholder="Email"  value="{{ old('email') }}">
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
                                            placeholder="Phone Number" value="{{ old('phone_number') }}">
                                        @error('phone_number')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">CNIC Number</label>
                                        <input class="input focused @error('cnic_number') is-invalid @enderror"
                                            id="focusedInput" name="cnic_number" type="number" placeholder="CNIC Number"
                                            value="{{ old('cnic_number') }}">
                                        @error('cnic_number')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">Date Of Birth</label>
                                        <input class="input focused @error('date_of_birth') is-invalid @enderror"
                                            id="focusedInput" name="date_of_birth" type="date"
                                            placeholder="xxxxxxxxxxxxx" value="{{ old('date_of_birth') }}">
                                        @error('date_of_birth')
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
                        <div class="muted pull-left">Students List</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <table cellpadding="0" width="100%" cellspacing="0" border="0" class="table" id="example">
                                <thead>
                                    <tr>
                                        <th width="@php echo 100/5; @endphp%">Sr.No</th>
                                        <th width="@php echo 100/5; @endphp%">Class Name</th>
                                        <th width="@php echo 100/5; @endphp%">Class Session</th>
                                        <th width="@php echo 100/5; @endphp%">No Of Students</th>
                                        <th width="@php echo 100/5; @endphp%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($classes as $class)
                                    <tr>
                                        <td width="@php echo 100/5; @endphp%">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td width="@php echo 100/5; @endphp%">{{ $class->class_name }}</td>
                                        <td width="@php echo 100/5; @endphp%">{{ $class->session_year }}</td>
                                        <td width="@php echo 100/5; @endphp%">{{ count($class->students) }}</td>
                                        <td width="@php echo 100/5; @endphp%">
                                        <a
                                            href="{{ route('classes.show',$class->id) }}" class="btn btn-primary">
                                                Students List
                                            </a>
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
