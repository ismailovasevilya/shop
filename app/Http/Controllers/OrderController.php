<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Cart;


class OrderController extends Controller
{
    // public function save_to_cart(Request $req) {
    //     $order_item = OrderItem::where('session_key',  $order_item)->get();
    //     if (count(OrderItem::where('session_key',  $req->session()->get('key'))) == 1){
    //         $cart = new Cart;
    //         if(auth()->check()){
    //             $cart->user_id = auth()->user()->id;
    //         };
    //         $cart->price = $cart->$order_item->tot_price;
    //     }
    //     $cart->save();
    // }
    
    
    
    public function order($id, Request $req) {
        $product = Product::findOrFail($id);
        $cart = Cart::where('session_key', $req->session()->get('key'))->first();
        $order_item = new OrderItem;
        $order_item->session_key = $req->session()->get('key');
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
        // if (count(OrderItem::where('session_key',  $order_item)->get()) == 1){
        // $cart = new Cart;
        // if(auth()->check()){
        //     $cart->user_id = auth()->user()->id;
        // };
        // $cart->price = $order_item->tot_price;
        // $cart->save();
        // }
       
        return back();
    }

    
}




