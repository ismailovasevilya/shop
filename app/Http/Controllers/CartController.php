<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Category;
use Session;


class CartController extends Controller
{
    
    
    public function cart($id, Request $req) {
        if (auth()->check()) {
            $order_items = OrderItem::where('user_email', auth()->user()->email)->orWhere('user_id', $id)->get();
        } else {
            $order_items = OrderItem::where('session_key',Session::getId())->get();
        }
        return view('customer.cart', [
            'order_items' => $order_items,
            'categories' => Category::all(),
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
        
        if (auth()->check()) {
            $user = User::findOrFail(auth()->user()->id);
            return view('customer.checkout_auth', [
                'user' => $user,
                'categories' => Category::all()
        ]);
        } else {
            return view('customer.checkout_not_auth', [
                'categories' => Category::all()
        ]);
        }    
    }

    public function checkout_main_auth(Request $req) {
        if (auth()->check() && !auth()->user()->isAdmin()) {
            $order_items = OrderItem::where('user_email', auth()->user()->email)->get();
            $tot_price = 0; 
            $tot_qty = 0;
            foreach ($order_items as $order_item) {
                $tot_price = $tot_price + $order_item->tot_price;
                $tot_qty = $tot_qty + $order_item->product_number;
                $order_item->user_id = auth()->user()->id;
            }
            if (count(Order::where('session_key',Session::getId())->get()) == 0) {
                $order = new Order;
                $order->user_id = auth()->user()->id;
                $order->total_qty = $tot_qty;
                $order->total_price = $tot_price;
                $order->phone_number = $req->phone_number;
                $order->address = $req->address;
                $order->session_key = Session::getId();
                $order->save();
            }
            return view('customer.success');
            
        } elseif (!auth()->check()) {
            $order_items = OrderItem::where('session_key', Session::getId())->get();
            foreach ($order_items as $order_item) {
                $order_item->user_email = $req->email;
                $order_item->update();
            }
            $cart = Cart::where('session_key', Session::getId())->first();
            $cart->user_email = $req->email;
            $cart->update();
            return view('auth.register');
        }   
    }





    
}
