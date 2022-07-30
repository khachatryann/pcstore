@extends('layouts.app')
@section('title')
    Log In
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-mb-8"></div>
            <div class="col-md-4">
                <h2>Log In</h2>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @elseif(session('fail'))
                    <div class="alert alert-danger">{{ session('fail') }}</div>
                @endif
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control {{ ($errors->has('email')) ? 'is-invalid' : '' }}" id="email" name="email" placeholder="example@mail.com">
                        <span class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control {{ ($errors->has('password')) ? 'is-invalid' : '' }}" id="password" name="password" placeholder="At least 6 characters">
                        <span class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </span>
                    </div>

                    <button class="btn btn-outline-primary">Log In</button>
                    <a href="{{ route('register_view') }}" class="btn btn-link">Dont have an account</a>
                </form>
            </div>
        </div>
    </div>
@endsection
