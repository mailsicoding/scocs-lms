@extends('admins.layout.app')

@section('title','Students')

@section('content')

<div class="container-fluid main-content">

    <div class="row-fluid">
        <div class="span6">
            <h2>Students Of {{ $class->class_name }} ( {{ $class->session_year }} )</h2>
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
                                    <div class="controls">
                                        <label for="">Class Name</label>
                                        <input class="input focused @error('first_name') is-invalid @enderror"
                                            id="focusedInput" name="" disabled type="text" placeholder="First Name"
                                            value="{{ $class->class_name }} ( {{ $class->session_year }} )">
                                            <input type="hidden" name="class_name" value="{{ $class->id }}">
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
        @include('admins.students.list')
    </div>


</div>

@endsection
