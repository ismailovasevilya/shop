@extends('layouts.master', ['categories' => $categories])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Input your credentials') }}</div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" form="postForm" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="email"form="postForm" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Phone number') }}</label>
                            <div class="col-md-6">
                                <input type="text" form="postForm" class="form-control" placeholder="+998991234566"
                                    name='phone_number' aria-describedby="basic-addon2">
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <textarea form="postForm" class="form-control" name='address' aria-label="With textarea"></textarea>
                            </div>
                        </div> --}}
                    </div>
                    
                </div>
                <form id="postForm" action="{{ route('checkout_main') }}" method="post">
                    @csrf
                    <input type="submit" value="Checkout">
                </form>
            </div>
        </div>
    </div>
@endsection
