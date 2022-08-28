@extends('layouts.app')
@section('title')
{{ $post['name'] }}
@endsection
@section('content')
    <div class="container">
    <a href="{{ route('stores.index') }}" class="btn btn-secondary mt-2">Back</a>

{{--    <div class="card mt-4" style="width: 18rem;">--}}
{{--        @if(empty($post['image']))--}}
{{--            <img src="{{ asset('assets/uploads/post_images/default.png') }}" class="card-img-top" alt="">--}}
{{--        @elseif(!empty($post['image']))--}}
{{--            <img src="{{ asset('assets/uploads/post_images/' . $post['image']) }}" class="card-img-top" alt="">--}}
{{--        @endif--}}
{{--        <div class="card-body">--}}
{{--            <h5 class="card-title" style="color: burlywood">{{ $post['name'] }}</h5>--}}
{{--            <p class="card-text">{{ $post['content'] }}</p>--}}
{{--        </div>--}}
{{--        <ul class="list-group list-group-flush">--}}
{{--            <li class="list-group-item">Created By` <span style="color: Aqua">{{ $one_post['Author'] }}</span></li>--}}
{{--            <li class="list-group-item">Price` <span style="color: Aqua">{{ $one_post['price'] }}$</span></li>--}}
{{--            <li class="list-group-item">Qt` <span style="color: Aqua">{{ $one_post['qt'] }}</span></li>--}}
{{--            <li class="list-group-item">Created At` <span style="color: Aqua">{{ $one_post['created_at'] }}</span></li>--}}
{{--        </ul>--}}
    </div>
@endsection
