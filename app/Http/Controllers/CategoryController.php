<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;


class CategoryController extends Controller
{
    public function __construct() {
        // $this->middleware('isAdmin');
        // $this->middleware('auth');
    }

    public function getCategories() {
        $categories = Category::all();
        return view('admin.categories.categories', [
            'categories' => $categories
        ]);
    }

    public function openNewCategory() {
        $categories = Category::all();
        return view('admin.categories.addCategory', [
            'categories' => $categories
        ]);
    }

    public function addCategory(Request $req) {
        $validated = $req->validate([
            'name' => 'string|nullable|min:5',
            'description' => 'string|nullable|min:5'
        ]);

        $category = new Category();
        $category->name  = $req->name;
        $category->description  = $req->description;
        $category->slug = \Str::slug($req->name);
        $category->save();

        return redirect()
              ->route('getCategories')
              ->with('msg', 'Category has been created successfully');
    }

    public function deleteCategory($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()
                ->route('getCategories')
                ->with('msg', 'Category has been deleted successfully'); 
    }

     public function editCategory($slug) {
        $category = Category::where('slug', $slug)->first();
        
        return view('admin.categories.editCategory', [
            'category' => $category
        ]);
     }

    public function updateCategory($slug, Request $req) {
        $validated = $req->validate([
            'name' => 'string|nullable|min:5',
            'description' => 'string|nullable|min:5'
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->name  = $req->name ? $req->name : $category->name;
        $category->description  = $req->description ? $req->description : $category->description;
        $category->slug = \Str::slug($req->name);
        $category->update();

        return redirect()
                ->route('getCategories')
                ->with('msg', 'Category has been edited successfully'); 
    }

    public function products_in_category($slug) {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('category_id',$category->id )->orderBy('created_at', 'DESC')->paginate(2);
        return view('content.products', [
            'products' => $products,
            'category' => $category,
            'num' => $products->count(),
            'categories' => $categories
        ]);
    }


}
