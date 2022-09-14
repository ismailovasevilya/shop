@extends('layouts.master')
@section('content')
    <div class="col-sm-8">
        <div class="products">
            @foreach ($products as $product)
                <div class="card" style="width: 16rem; height: 31rem;">
                    <img class="card-img-top"
                        src="{{ $product->image ? asset('image/' . $product->image) : asset('img/pic.jpg') }}"
                        alt="Menu image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Price: <span id="val">{{ $product->price }}</span>$</p>
                        @if (auth()->check() &&
                            auth()->user()->isAdmin())
                            <a class="deleteBtn mr-4" href="{{ route('deleteProduct', ['id' => $product->id]) }}">
                                <i class="far fa-lg fa-trash"></i>
                            </a>
                            <a class="editBtn" href="{{ route('editProduct', ['slug' => $product->slug]) }}">
                                <i class="fas fa-lg fa-edit"></i>
                            </a>
                        {{-- @else
                            <a class="btnCategory" href="{{ route('order', ['id' => $product->id]) }}">Order</a> --}}
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

