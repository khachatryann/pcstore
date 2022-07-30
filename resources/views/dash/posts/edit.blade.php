@extends('layouts.app')
@section('title')
    Edit
@endsection
@section('content')
    <div class="container">
        <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-2">Back</a>
        <h2 class="mt-2">Edit Post</h2>

        <form action="{{ route('posts.update', $post['id']) }}" class="w-50" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Post Name</label>
                <input type="text" value="{{ $post['name'] }}" class="form-control {{ ($errors->has('name')) ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Asus">
                <span class="invalid-feedback">
                    {{ $errors->first('name') }}
                </span>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Select Post Image</label>
                <input type="file" class="form-control {{ ($errors->has('image')) ? 'is-invalid' : '' }}" id="image" name="image">
                <span class="invalid-feedback">
                    {{ $errors->first('image') }}
                </span>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Enter Product Price</label>
                <input type="text" value="{{ $post['price'] }}" class="form-control {{ ($errors->has('price')) ? 'is-invalid' : '' }}" id="price" name="price" placeholder="5000">
                <span class="invalid-feedback">
                    {{ $errors->first('price') }}
                </span>
            </div>

            <div class="mb-3">
                <label for="qt" class="form-label">Select Product Quantity</label>
                <input type="number" value="{{ $post['qt'] }}" class="form-control {{ ($errors->has('qt'))  ? 'is-invalid' : ''}}" id="qt" name="qt" placeholder="1" min="1">
                <span class="invalid-feedback">
                    {{ $errors->first('qt') }}
                </span>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Enter Post Content</label>
                <textarea class="form-control {{ ($errors->has('content')) ? 'is-invalid' : '' }}" name="content" id="content" rows="3"></textarea>
                <span class="invalid-feedback">
                    {{ $errors->first('content') }}
                </span>
            </div>

            <button class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
