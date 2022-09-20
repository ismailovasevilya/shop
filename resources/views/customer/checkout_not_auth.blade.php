@extends('layouts.master', ['categories' => $categories])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form id="postForm" action="{{ route('checkout_main_auth') }}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">{{ __('Input your credentials') }}</div>

                        <div class="card-body">

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                        </div>
                        
                    </div>
                
                   
                    <input type="submit" value="Checkout">
                </form>
            </div>
        </div>
    </div>
@endsection
