@extends('layouts.master')
@section('content')
<div class="container">
    @if(!$orders || $cart_order==0)
    <div class="orders" style="margin: 200px">
        <h3 class="text-center">
            You have no orders
        </h3>
    </div>
    @else
    <?php $overallPrice = 0 ?>
    <div class="orders" style="margin: 140px">
        <h3 style="color: #bb192e" class="text-center mb-5">Your orders</h3>
        <div class="list-group">
            <ul class="list-group ">
                @foreach ($orders_item as $order_item)
                   
                    <?php $overallPrice += $order_item->tot_price ?>
                        <li style="font-weight: bold;
                            font-family: "Lucida Console", Courier, monospace;" class="list-group-item">
                            Product: {{ $order_item->product_title }}
                            </a>
                            <br>
                            Quantity: {{$order_item->product_number}}
                            <br>
                            Price/item: {{$order_item->product_price}}$
                            <br>
                        
                        </li>
                        <li style="color: black" class="list-group-item recived">
                        Status:
                        <span style="color: #bb192e" class="ml-2 mr-2">
                        {{ $orders->status }}
                        </span>   
                </li>
                <span style="color: black" class="mt-3">Overall Price: <strong>{{ $overallPrice }}</strong> $</span>
                    
                @endforeach
                
            </ul>
        </div>
    </div>
    @endif
</div>
@endsection