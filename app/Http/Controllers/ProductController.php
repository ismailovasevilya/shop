<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function create()
    {
        return view('admin.products.add_product',[
            'categories' => Category::all()
		]);
    }
}
