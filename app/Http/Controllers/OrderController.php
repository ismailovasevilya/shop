<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function order($id) {
        $product = Product::findOrFail($id);
        $order = new Order;
        $order->product_id = $product->id;
        $order->product_price = $product->price;
        $order->product_title = $product->name;
        $order->product_number = 1;
        $order->tot_price = $product->price;
        $order->user_id = auth()->user()->id;
        $order->save();
        return back();
    }
}


