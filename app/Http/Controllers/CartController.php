<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Category;



class CartController extends Controller
{
    
    
    public function cart($id, Request $req) {
        if (auth()->check()) {
            $order_items = OrderItem::where('user_id', $id)->get();
        } else {
            $order_items = OrderItem::where('session_key', $req->session()->get('key'))->get();
        }
        // $cart = Cart::where('session_key', $req->session()->get('key'))->first();
        return view('customer.cart', [
            'order_items' => $order_items,
            'categories' => Category::all(),
            // 'cart' => $cart
        ]); 
    }

    public function plus($order_id) {
        $order_item = OrderItem::findOrFail($order_id);
        $order_item->product_number += 1;
        $order_item->tot_price = $order_item->product_price * $order_item->product_number;
        $order_item->update();
        return back();
    }

    public function minus($order_id) {
        $order_item = OrderItem::findOrFail($order_id);
        $order_item->product_number -= 1;
        $order_item->tot_price = $order_item->product_price * $order_item->product_number;
        $order_item->update();
        return back();
    } 

    public function checkout_auth() {
        return view('customer.checkout_auth', [
            'categories' => Category::all()
        ]);
    }

    public function checkout_main(Request $req) {
        if (auth()->check() && !auth()->user()->isAdmin()) {
            $order_items = OrderItem::where('user_id', auth()->user()->id)->get();
            $tot_price = 0; 
            $tot_qty = 0;
            foreach ($order_items as $order_item) {
                $tot_price += $order_item->tot_price;
                $tot_qty +=  $order_item->product_number;
            
            $order = new Order;
            $order->user_id = auth()->user()->id;
            $order->total_qty = $tot_qty;
            $order->total_price = $tot_price;
            $order->phone_number = $req->phone_number;
            $order->address = $req->address;
            $order->session_key = $req->session()->get('key');
            $order->save();
            }
        } elseif (!auth()->check()) {
            $order_items = OrderItem::where('session_key', $req->session()->get('key'))->get();
            
        }
            
        }
    
}
