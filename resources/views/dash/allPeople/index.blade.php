@extends('layouts.app')
@section('title')
    Users
@endsection
@section('content')
    <x-nav-bar />

    <div class="container">
        <h1 class="mt-2" style="color: #e1a727">All Registered People</h1>
        <h2 class="mt-3" style="color: Navy">People Count ( <span style="color:Maroon;">{{ count($users) }}</span> )</h2>
        @if(session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif
        @if(session('good'))
            <div class="alert alert-success mt-3">{{ session('good') }}</div>
        @endif
        <table class="table mt-3">
            <thead>
            <tr class="table-info">
                <th scope="col" style="color: burlywood">ID</th>
                <th scope="col" style="color: burlywood">Name</th>
                <th scope="col" style="color: burlywood">Email</th>
                <th scope="col" style="color: burlywood">Role ID</th>
                <th scope="col" style="color: burlywood">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user['id'] }}</th>
                <td>{{ $user['name'] }}</td>
                <td>{{ $user['email'] }}</td>
                <td>{{ $user['role_id'] }}</td>
                <td>
                        @if( $user['role_id'] == 1)
                            <button class="btn btn-danger" disabled>Delete</button>
                        @else
                            <a href="{{ route('people_delete', $user['id']) }}" class="btn btn-danger">Delete</a>
                        @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
