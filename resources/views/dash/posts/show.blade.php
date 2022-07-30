@extends('layouts.app')
@section('title')
    {{ $one_post['name'] }}
@endsection
@section('content')
    <div class="container">
        <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-2">Back</a>


            <div class="card mt-4" style="width: 18rem;">
                @if(empty($one_post['image']))
                    <img src="{{ asset('assets/uploads/post_images/default.png') }}" class="card-img-top" alt="">
                @elseif(!empty($one_post['image']))
                    <img src="{{ asset('assets/uploads/post_images/' . $one_post['image']) }}" class="card-img-top" alt="">
                @endif
                <div class="card-body">
                    <h5 class="card-title" style="color: burlywood">{{ $one_post['name'] }}</h5>
                    <p class="card-text">{{ $one_post['content'] }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Created By` <span style="color: Aqua">{{ $one_post['Author'] }}</span></li>
                    <li class="list-group-item">Price` <span style="color: Aqua">{{ $one_post['price'] }}$</span></li>
                    <li class="list-group-item">Qt` <span style="color: Aqua">{{ $one_post['qt'] }}</span></li>
                    <li class="list-group-item">Created At` <span style="color: Aqua">{{ $one_post['created_at'] }}</span></li>
                    <li class="list-group-item"><a href="{{ route('posts.edit', $one_post['id']) }}" class="btn btn-outline-success">Edit</a>
                    <form action="{{ route('posts.destroy', $one_post['id']) }}" method="post" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </li>
                </ul>
            </div>
    </div>

@endsection
