@extends('layouts.master', ['categories' => $categories])
@section('content')
    <div class="container">
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>

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
        <form id="postForm" action="{{ route('addCategory') }}" method="post">
            @csrf
            <input type="submit" value="Add">
        </form>
    </div>
@endsection
