@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
    <x-nav-bar />

    @if(session('warning'))
        <div class="alert alert-danger mt-3">{{ session('warning') }}</div>
    @endif

@endsection
