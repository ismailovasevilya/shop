<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;

class ShopController extends Controller
{
    // public function __construct() {
    //     $this->middleware('isAdmin');
    //     $this->middleware('auth');
    // }

    public function getContent(Request $req) {
        if (count(Cart::all()) == 0) {
            $cart = new Cart;
        
            if (auth()->check() && auth()->user()->isAdmin())
                $cart->user_id = auth()->user()->id;
            $cart->session_key = $req->session()->get('key');
            $cart->save();
        }
        $products = Product::orderBy('created_at', 'DESC')->limit(10)->get();
        $categories = Category::all();
        return view('content.all_products', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
