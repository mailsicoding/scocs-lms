@extends('admins.layout.app')

@section('title','Classes')

@section('content')

<div class="container-fluid main-content">

    <div class="row-fluid">
        <div class="span6">
            <h2>Classes</h2>
        </div>
    </div>
    <div style="height:20px;"></div>

    <div class="row-fluid">
        <div class="span3" id="adduser">
            <div class="row-fluid">
                <!-- block -->
                <div class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Add Class</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form method="post" action="{{ route('classes.store') }}">
                                @csrf
                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">Class Name</label>
                                        <input class="input focused @error('class_name') is-invalid @enderror"
                                            id="focusedInput" name="class_name" type="text" placeholder="Class Name"
                                            value="">
                                        @error('class_name')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <label for="">Session Year</label>
                                        <input class="input focused @error('session_year') is-invalid @enderror"
                                            id="focusedInput" name="session_year" type="number"
                                            placeholder="Session Year" value="">
                                        @error('session_year')
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
        @include('admins.classes.list')
    </div>


</div>

@endsection
