@extends('layouts.app')
@section('title','Login')
@section('content')
<div class="panel panel-default text-center paper-shadow" data-z="0.5">
    <h1 class="text-display-1 text-center margin-bottom-none">Student</h1>
    <img src="{{ asset('frontend_assets/auth_assets/images/logo.png') }}" class="img-circle width-80">
    <form action="{{route('student.password.reset')}}" method="post">
        @csrf
        <div class="panel-body">
            
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="token" value="{{ $token }}">
            
            <div class="form-group">
                <label for="password">New Password</label>
                <input class="form-control @error('new_password') is-invalid @enderror" id="new_password"
                    name="new_password" type="password" value="{{old('new_password')}}" placeholder="Enter New Password">
                @error('new_password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password"
                    name="confirm_password" value="{{old('confirm_password')}}" type="password" placeholder="Confirm New Password">
                @error('confirm_password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Reset <i class="fa fa-fw fa-unlock-alt"></i></button>
        </div>
    </form>
</div>
@endsection
