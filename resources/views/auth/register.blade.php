@extends('layouts.app')
@section('title')
    Registration
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-mb-8"></div>
            <div class="col-md-4">
                <h2>Create Account</h2>
                @if(session('success'))
                    <div class="alert alert-danger">{{ session('success') }}</div>
                @endif
                <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name" name="name" placeholder="John">
                        <span class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <label for="avatar" class="form-label">Avatar</label>
                        <input type="file" class="form-control {{ ($errors->has('avatar')) ? 'is-invalid' : '' }}" id="avatar" name="avatar">
                        <span class="invalid-feedback">
                            {{ $errors->first('avatar') }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control {{ ($errors->has('email')) ? 'is-invalid' : '' }}" id="email" name="email" placeholder="example@mail.com">
                        <span class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password {{ ($errors->has('password')) ? 'is-invalid' : '' }}" name="password" placeholder="At least 6 characters">
                        <span class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </span>
                    </div>

                    <button class="btn btn-outline-primary">Sign Up</button>
                    <a href="{{ route('login_view') }}" class="btn btn-link">Already have an account</a>
                </form>
            </div>
        </div>
    </div>
@endsection
