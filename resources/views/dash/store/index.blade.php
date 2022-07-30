@extends('layouts.app')
@section('title')
    Store
@endsection
@section('content')
    <x-nav-bar />
    <div class="container">
{{--        @if(session('success'))--}}
{{--            <div class="alert alert-success mt-2">{{ session('success') }}</div>--}}
{{--        @endif--}}
        <h2 class="mt-2" style="color: Navy">ALL PRODUCTS ( <span style="color: Maroon">{{ count($posts) }}</span> )</h2>

        @foreach($posts as $post)
            <div class="card mt-4" style="width: 18rem;">
                @if(empty($post['image']))
                    <img src="{{ asset('assets/uploads/post_images/default.png') }}" class="card-img-top" alt="">
                @elseif(!empty($post['image']))
                    <img src="{{ asset('assets/uploads/post_images/' . $post['image']) }}" class="card-img-top" alt="">
                @endif
                <div class="card-body">
                    <h5 class="card-title" style="color: burlywood">{{ $post['name'] }}</h5>
                    <p class="card-text">{{ $post['content'] }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Price` <span style="color: Aqua">{{ $post['price'] }}$</span></li>
                </ul>
                <div class="card-body">
                    <a href="{{ route('stores.show', $post) }}" class="btn btn-outline-warning">BUY</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
