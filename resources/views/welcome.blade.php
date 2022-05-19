@extends('layouts.app')
@section('title','Welcome')
@section('content')
    <div class="panel panel-default text-center paper-shadow" data-z="0.5">
        <h1 class="text-display-1 text-center margin-bottom-none">Login</h1>
        <img src="{{ asset('frontend_assets/auth_assets/images/logo.png') }}" class="img-circle width-80">
        <div class="panel-body">
            <div class="form-group">
                <a href="{{ route('admin.login.form') }}" class="btn btn-danger btn-block">Administration Login <i
                        class="fa fa-fw fa-unlock-alt"></i></a>
            </div>
            <div class="form-group">
                <a href="{{ route('teacher.login.form') }}" class="btn btn-warning btn-block">Teacher Login <i
                        class="fa fa-fw fa-unlock-alt"></i></a>
            </div>
            <div class="form-group">
                <a href="{{ route('student.login.form') }}" class="btn btn-primary btn-block">Student Login <i
                        class="fa fa-fw fa-unlock-alt"></i></a>
            </div>
        </div>
    </div>
@endsection
