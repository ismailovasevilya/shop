<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Cart;
use Session;


class OrderController extends Controller
{

    
    
    public function order($id, Request $req) {
        $product = Product::findOrFail($id);
        $cart = Cart::where('session_key',Session::getId())->first();
        $order_item = new OrderItem;
        $order_item->session_key = Session::getId();
        $order_item->product_id = $product->id;
        $order_item->product_price = $product->price;
        $order_item->product_title = $product->name;
        $order_item->product_number = 1;
        $order_item->tot_price = $product->price;
        $order_item->cart_id = $cart->id;
        if(auth()->check()){
            $order_item->user_id = auth()->user()->id;
        }
        $order_item->save();
       
        return back();
    }


    public function orders() {
        $cart = Cart::where(Cart::where('user_id', auth()->user()->email))->first();
        $cart->delete();
        return view('customer.success');
    }

    
}




