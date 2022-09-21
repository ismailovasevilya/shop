@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-2">
                        <h3>Orders</h3>
                    </div>
                </div>
                <ul class="list-group">
                    @foreach($orders as $order)
                        <table class="table table-borderless">    
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Details</th>
                                    <th scope="col">Total cost</th>
                                    <th scope="col">Accept</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <tr >
                                        <td rowspan="2" scope="row">{{ $order->id  }}</td>
                                        <td rowspan="2" scope="row">{{ $order->user->name  }}</td>
                                        <td rowspan="2" scope="row">{{ $order->user->email  }}</td>
                                        <td rowspan="2" scope="row">{{ $order->phone_number }}</td>
                                        @foreach($order->order_items as $order_item)
                                            
                                                <td scope="row">{{ $order_item->product_title }} : {{ $order_item->product_number }}</td>
                                                <td scope="row">123</td>
                                                <td scope="row">accept</td>
                                            
                                        @endforeach
                                    </tr>
                                
                            </tbody>
                        </table>
                        {{-- @if($order->recived) --}}
                        
                    @endforeach
                </ul>
                {{-- <div class="pagination-links">
                    {{ $orders->links() }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection