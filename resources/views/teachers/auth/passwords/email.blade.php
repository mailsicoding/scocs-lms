@extends('layouts.app')
@section('title','Forgot Password')
@section('content')
<div class="panel panel-default text-center paper-shadow" data-z="0.5">
    <h1 class="text-display-1 text-center margin-bottom-none">Teacher</h1>
    <img src="{{ asset('frontend_assets/auth_assets/images/logo.png') }}" class="img-circle width-80">
    <form action="{{ route('teacher.password.link') }}" method="post">
        @csrf
        <div class="panel-body">
            <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control @error('username') is-invalid @enderror"
                    value="{{ old('username') }}" name="username" id="username" type="text" placeholder="Username">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Send Password Reset Email <i class="fa fa-fw fa-unlock-alt"></i></button>
        </div>
    </form>
</div>
@endsection
