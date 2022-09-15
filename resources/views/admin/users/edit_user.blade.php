@extends('layouts.master', ['categories' => $categories])
@section('content')
    <div class="container">
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                    form="postForm" name="name" placeholder="{{ $user->name }}">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    form="postForm" name="email" placeholder="{{ $user->email }}">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-3">
            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
            
            <div class="col-md-6">
                <select name="role" form="postForm" class="form-select">
                    <option name="role" form="postForm">{{ $user->role == 'admin' ? 'admin' : 'user' }}</option>
                    <option name="role" form="postForm">{{ $user->role == 'admin' ? 'user' : 'admin' }}</option>
                </select>
                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <form id="postForm" action="{{ route('updateUser', ['id' => $user->id]) }}" method="post">
            @csrf
            <input type="submit" value="Edit">
        </form>
    </div>
@endsection
