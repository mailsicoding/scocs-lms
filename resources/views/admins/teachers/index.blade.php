@extends('admins.layout.app')

@section('title','Students')

@section('content')

<div class="container-fluid main-content">

    <div class="row-fluid">
        <div class="span6">
            <h2>Teachers</h2>
        </div>
    </div>
    <div style="height:20px;"></div>

    <div class="row-fluid">
        <div class="span3" id="adduser">
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Add Teacher</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form method="post" action="{{ route('teachers.store') }}">
                                @csrf
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
        @include('admins.teachers.list')
    </div>


</div>

@endsection
