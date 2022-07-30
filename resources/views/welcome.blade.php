@extends('layouts.app')
@section('title')
    Welcome
@endsection
@section('content')
    <div class="container">
        <h2>Welcome</h2>
        <a href="{{ route('register_view') }}" class="btn btn-primary">Create Account</a>
        <br>
        <a href="{{ route('login_view') }}" class="btn btn-success mt-2">Log In</a>
    </div>
@endsection
