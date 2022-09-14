@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('New Product') }}</label>

            <div class="col-md-6">
                <input type="text" class="form-control @error('name') is-invalid @enderror" form="postForm" name="name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

            <div class="col-md-6">
                <input type="text" class="form-control @error('description') is-invalid @enderror" form="postForm"
                    name="description">

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

            <div class="col-md-6">
                <input type="text" class="form-control @error('description') is-invalid @enderror" form="postForm"
                    name="price">

                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="">Category</label>
            <select name="category_id" form="postForm" class="form-control @error('category_id') is-invalid @enderror"
                id="">
                @foreach ($categories as $category)
                    <option name="category_id" value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <div class="custom-file">
                  <input name="image" type="file" form="postForm" class="custom-file-input">
                  <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
            </div>
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
        <form id="postForm" action="{{ route('createProduct') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="submit" value="Add">
        </form>
    </div>
@endsection
