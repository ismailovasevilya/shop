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
                                @foreach($orders as $order)
                                    <tr>
                                        <td style="vertical-align: center" scope="row">{{ $order->id  }}</td>
                                        <td style="vertical-align: center" scope="row">{{ $order->user->name  }}</td>
                                        <td style="vertical-align: center" scope="row">{{ $order->user->email  }}</td>
                                        <td style="vertical-align: center" scope="row">{{ $order->phone_number }}</td>
                                        <td style="vertical-align: center" scope="row">
                                        @foreach($order->order_items as $order_item)        
                                                {{ $order_item->product_title }} : {{ $order_item->product_number }}<br>        
                                        @endforeach
                                        </td>
                                        <td style="vertical-align: center" scope="row">{{ $order->total_price }}</td>
                                        <td style="vertical-align: center" scope="row">
                                            <form action="{{ route('accept', $order->id) }}" method="post">
                                                @csrf
                                                <button class="btn btn-{{ $order->status=='accepted' ? 'success' : '' }}">{{ $order->status=='accepted' ? 'Accepted' : 'Accept' }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        {{-- @if($order->recived) --}}
                        
                    
                </ul>
                {{-- <div class="pagination-links">
                    {{ $orders->links() }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection