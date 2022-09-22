<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Session;

class ShopController extends Controller
{
    // public function __construct() {
    //     $this->middleware('isAdmin');
    //     $this->middleware('auth');
    // }

    public function getContent(Request $req) {
        
        if(auth()->check()) {
            if (count(Cart::where('user_email', auth()->user()->email)->get())==0){
                $cart = new Cart;
                $cart->user_email = auth()->user()->email;
                $cart->user_id = auth()->user()->id;
                $cart->session_key = Session::getId();
                $cart->save();
            }
            else {
                $cart = Cart::where('user_email', auth()->user()->email)->first();
                $cart->user_id = auth()->user()->id;
                $cart->update();
            }
        }
        
        elseif (!auth()->check()) {
            if (count(Cart::where('session_key', Session::getId())->get()) == 0) {
                $cart = new Cart;
                $cart->session_key = Session::getId();
                $cart->save();
            }
        }
    
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        $categories = Category::all();

        if (auth()->check() && auth()->user()->isAdmin()) {
            return redirect()->route('admin', [
                'categories' => $categories,
                'products' => $products
            ]);
        }
        else {
            return view('content.all_products', [
            'categories' => $categories,
            'products' => $products
        ]);
        }
        
    }

    public function priceUp() {
        $categories = Category::all();
        $products = Product::orderBy('price')->paginate(10);
        return view('content.products', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function priceDown() {
        $categories = Category::all();
        $products = Product::orderBy('price', 'DESC')->paginate(10);
        return view('content.products', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function dayUp() {
        $categories = Category::all();
        $products = Product::orderBy('created_at')->paginate(10);
        return view('content.products', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
    public function dayDown() {
        $categories = Category::all();
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('content.products', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
