@extends('layouts.master', ['categories' => $categories])
@section('content')
    <div class="container">
        <div class="flex">
            <img style="width: 30%; margin:20px" class="card-img-top" src="{{ $product->image ? asset('image/' . $product->image) : asset('img/pic.jpg') }}"
                alt="Menu image">
        
            <div style= "margin:20px">
                <div>
                    Description: {{$product->description}}
                </div>
                <div>
                    Price: {{$product->price}}
                </div>
                <div>
                    <form id="postForm" action="{{ route('order', ['id' => $product->id]) }}" method="post">
                        @csrf
                        <input type="submit" value="Add to cart">
                    </form>
                </div>
            </div>
        </div>



    </div>
@endsection
