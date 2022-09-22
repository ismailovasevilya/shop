<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isAdmin');
        // $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::all();
        $products = Product::orderBy('created_at', 'DESC')->paginate(10);
        return view('content.all_products', [
            'categories' => $categories,
            'products' => $products 
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
   
}
