<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Cart;
use App\Models\Category;
use Session;


class OrderController extends Controller
{ 
    public function order($id, Request $req) {
        //add to cart
        $product = Product::findOrFail($id);
        $cart = Cart::where('session_key',Session::getId())->first();
        if (count(OrderItem::where('session_key',Session::getId())->where('product_id', $id)->get()) == 0) {
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
                $order_item->user_email = auth()->user()->email;
        }
        $order_item->save();
        } else {
            return back()->with('msg', 'You have already added this product to the cart');
        }
      
        return back();
    }


    public function orders() {
        //open my order
        if (auth()->check()){
            
            $orders_item = OrderItem::where('user_email', auth()->user()->email)->get();
            if (count(Order::where('user_id', auth()->user()->id)->get()) > 0) {
                $orders = Order::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();
                foreach ($orders_item as $order_item) {
                    $order_item->order_id = $orders->id;
                    $order_item->update();
                }
                $cart_order = 1;
                $cart = Cart::where('user_id', auth()->user()->id)->first();
                if ($cart) {
                    $cart->delete();
                }
                
                return view('customer.orders',[
                    'orders_item' => $orders_item,
                    'orders' => $orders,
                    'cart_order' => $cart_order,
                    'categories' => Category::all()
                ]);
            }
            else {
                return back()->with('msg', 'You have not made an order yet');
            }
        }
        else {
            return back()->with('msg', 'please, login first');
        }
    }

    public function adminOrder() {
        $orders = Order::all();
        return view('admin.orders.orders', [
            'orders'=>$orders,
            'categories' => Category::all()
        ]);
    }

    public function accept($id) {
        $order = Order::findOrFail($id);
        $order->status = 'accepted';
        $order->update();
        return back();
    }

    

    
}




