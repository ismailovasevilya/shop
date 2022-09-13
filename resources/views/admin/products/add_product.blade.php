@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('New Product') }}</label>

            <div class="col-md-6">
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                    form="postForm" name="name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

            <div class="col-md-6">
                <input type="text" class="form-control @error('description') is-invalid @enderror"
                    form="postForm" name="description">

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

            <div class="col-md-6">
                <input type="text" class="form-control @error('description') is-invalid @enderror"
                    form="postForm" name="price">

                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="input-group mb-3">
                <div class="input-group-prepend @error('image') is-invalid @enderror">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                </div>
                <div class="custom-file">
                  <input name="image" type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                  <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                </div>
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        <form id="postForm" action="{{ route('addProduct') }}" method="post">
            @csrf
            <input type="submit" value="Add">
        </form>
    </div>
@endsection