@extends('layouts.master')


@section('content')
    @foreach ($orders as $order)
        <div class="card mb-3" style="width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $order->product_title }}</h5>
                        <p class="card-text">Price: {{ $order->product_price }} $</p>
                        <p class="card-text">Price: {{ $order->tot_price }} $</p>
                        <div>
                          <a href=""><i class="fa-regular fa-plus"></i></a>
                          {{ $order->product_number }}
                          <a href=""><i class="fa-solid fa-minus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
