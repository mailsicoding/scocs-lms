@extends('layouts.app')
@section('title','Forgot Password')
@section('content')
<div class="panel panel-default text-center paper-shadow" data-z="0.5">
    <h1 class="text-display-1 text-center margin-bottom-none">Student</h1>
    <img src="{{ asset('frontend_assets/auth_assets/images/logo.png') }}" class="img-circle width-80">
    
        <div class="panel-body">
            <div class="form-group">
                <b>Your Password Updated Successfully.</b></br></br>
            </div>
            <a class="btn btn-primary" href="{{route('students.login.form')}}" type="submit">Login <i class="fa fa-fw fa-unlock-alt"></i></a>
        </div>
    
</div>
@endsection
