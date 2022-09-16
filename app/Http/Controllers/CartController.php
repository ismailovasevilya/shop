<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Category;



class CartController extends Controller
{
    public function cart($id) {
        $orders = Order::where('user_id', $id)->get();
        return view('customer.cart', [
            'orders' => $orders,
            'categories'=>Category::all()
        ]); 
    }
}
