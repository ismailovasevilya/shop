<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class ShopController extends Controller
{
    // public function __construct() {
    //     $this->middleware('isAdmin');
    //     $this->middleware('auth');
    // }

    public function getContent() {
        $categories = Category::all();
        return view('layouts.master', ['categories' => $categories]);
        
    }
}
