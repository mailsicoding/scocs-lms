@extends('layouts.app')
@section('title','Login')
@section('content')
<div class="panel panel-default text-center paper-shadow" data-z="0.5">
    <h1 class="text-display-1 text-center margin-bottom-none">Admin</h1>
    <img src="{{ asset('frontend_assets/auth_assets/images/logo.png') }}" class="img-circle width-80">
    <form action="" method="post">
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
            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control @error('username') is-invalid @enderror" id="password"
                    name="password" type="password" placeholder="Enter Password">
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Login <i class="fa fa-fw fa-unlock-alt"></i></button>
            <a href="{{ route('admin.password.forgot') }}" class="forgot-password">Forgot password?</a>
        </div>
    </form>
</div>
@endsection
