@extends('layouts.master')


@section('content')
    {{-- @if($cart_order==0 )
    <div class="orders" style="margin: 200px">
        <h3 class="text-center">
            Your cart is empty
        </h3>
    </div> --}}
    @if (count($order_items) == 0)
    <div class="orders" style="margin: 200px">
        <h3 class="text-center">
            Your cart is empty
        </h3>
    </div>
    @else

    @foreach ($order_items as $order_item)
        <div class="card mb-3" style="width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $order_item->product_title }}</h5>
                        <p class="card-text">Price: {{ $order_item->product_price }} $</p>
                        <p class="card-text">Price: {{ $order_item->tot_price }} $</p>
                        <div>
                            <p>
                                <form class="inline" action="{{ route('plus', ['order_id' => $order_item->id] ) }}" method="post">
                                    @csrf
                                    <button class=" btn btn-danger" type="submit"><i class="fa-regular fa-plus"></i></button>
                                </form>
                                {{ $order_item->product_number }}
                                <form class="inline" action="{{ route('minus', ['order_id' => $order_item->id] ) }}" method="post">
                                    @csrf
                                    <button class="btn btn-danger" type="submit"><i class="fa-solid fa-minus"></i></button>
                                </form>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    
    
    <div><a href="{{ route('checkout_auth') }}">Checkout</a></div>
    @endif
@endsection
