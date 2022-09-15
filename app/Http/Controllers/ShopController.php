<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;


class ShopController extends Controller
{
    // public function __construct() {
    //     $this->middleware('isAdmin');
    //     $this->middleware('auth');
    // }

    public function getContent() {
        $products = Product::orderBy('created_at', 'DESC')->limit(10)->get();
        $categories = Category::all();
        return view('content.all_products', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}
