@extends('layouts.app')
@section('title','Forgot Password')
@section('content')
<div class="panel panel-default text-center paper-shadow" data-z="0.5">
    <h1 class="text-display-1 text-center margin-bottom-none">Admin</h1>
    <img src="{{ asset('frontend_assets/auth_assets/images/logo.png') }}" class="img-circle width-80">
    <form action="{{ route('teacher.password.link') }}" method="post">
        @csrf
        <div class="panel-body">
            <div class="form-group">
                <p>We have emailed password reset link to <b> {{ $email }} </b>. Please check your email to reset your password.</p>
            </div>
            <input type="hidden" name="username" value="{{ $username }}">
            <button class="btn btn-primary" type="submit">Resend Email <i class="fa fa-fw fa-unlock-alt"></i></button>
        </div>
    </form>
</div>
@endsection
