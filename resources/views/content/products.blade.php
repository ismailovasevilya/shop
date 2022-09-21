@extends('layouts.master', ['categories' => $categories])
@section('content')
<ul class="nav justify-content-start">
    <li class="nav-item">
        Price
        <form id="postForm" class="inline" action="{{ route('priceUp') }}" method="get">
            @csrf
            <button class="btn no-font" type="submit"><i class="fas fa-regular fa-arrow-up"></i></button>
        </form>
        <form id="postForm" class="inline" action="{{ route('priceDown') }}" method="get">
            @csrf
            <button class="btn no-font mrg" type="submit"><i
                    class="fas fa-regular fa-arrow-down"></i></button>
        </form>
    </li>
    <li class="nav-item">
        Date of creation
        <form id="postForm" class="inline" action="{{ route('dayUp') }}" method="get">
            @csrf
            <button class="btn no-font" type="submit"><i class="fas fa-regular fa-arrow-up"></i></button>
        </form>
        <form id="postForm" class="inline" action="{{ route('dayDown') }}" method="get">
            @csrf
            <button class="btn no-font" type="submit"><i class="fas fa-regular fa-arrow-down"></i></button>
        </form>
    </li>

</ul>
    <div class="col-sm-8">
        {{-- <h2>{{ $category->name }}</h2> --}}
        <div class="products">
            @foreach ($products as $product)
                @if ($product->active)
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
                            @else    
                                <form id="postForm" action="{{ route('order', ['id' => $product->id]) }}" method="post">
                                    @csrf
                                    <input type="submit" value="Add to cart">
                                </form>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        @if (auth()->check() &&  Auth()->user()->isAdmin())
            <a href="{{ route('addProduct') }}">Add new product</a>
        @endif
            <div style="color: #bb192e" class="pagination-links">
		    {{ $products->links() }}
	    </div>
    </div>
@endsection

