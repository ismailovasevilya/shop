<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function getProducts() {
        $products = Product::orderBy('created_at', 'DESC')->limit(10)->get();
        $categories = Category::all();
        return view('content.all_products', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
    
    public function addProduct() {
        return view('admin.products.add_product',[
            'categories' => Category::all()
		]);
    }

    public function createProduct(Request $req) {
 
        
        $validated = $req->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($req->image != null){

            $imageName = time().'.'.$req->image->extension();
            $req->image->move(public_path('image'), $imageName);
        }
        $product = new Product();
        $product->name  = $req->name;
        $product->description  = $req->description;
        $product->slug = \Str::slug($req->name);
        $product->price  = $req->price;
        $product->category_id  = $req->category_id;
        $product->image  =  $imageName ? $imageName : null;
        $product->save();

        // Product::create([
        //     'name' => $req->name,
        //     'description' => $req->description,
        //     'price' => $req->price,
        //     'image' => $imageName ? $imageName : null,
        //     'category_id' => $req->category_id,
        //     'slug' => $product->slug
        // ]);
        
       
        return redirect()
                ->route('getProducts')
                ->with('msg', 'Item has been added to menu successfully');
    }

    public function editProduct($slug) {
        $product = Product::where('slug', $slug)->first();
        $category = Category::where('id', $product->category_id)->first();
        $categories = Category::all();

        return view('admin.products.edit_product', [
            'product'=>$product,
            'category'=>$category,
            'categories'=>$categories
        ]);
    }

    public function updateProduct($id, Request $req) {
        $product = Product::FindOrFail($id);
        $category = Category::where('id', $product->category_id)->first();
        $validated = $req->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        if(\File::exists($req->image))
        {
            if(\File::exists('image/' .$product->image))
                //If there is a new image delete the old one
                unlink('image/' .$product->image);

            //Get unique name for a image and upload it.
            $imageName = time().'.'.$req->image->extension();
            $req->image->move(public_path('image'), $imageName);

            //Update menu properties
            $product->update([
                'name' => $req->name,
                'description' => $req->description,
                'price' => $req->price,
                'image' => $imageName,
                'category_id' => $req->category_id
            ]);  
        } else {
            //Update menu properties
            $product->update($validated);
        }

        return redirect()
                ->route('admin_products_in_category', [
                    'slug' => $category->slug 
                ] )
                ->with('msg', 'Item has edited successfully');
    }

    public function deleteProduct($id) {
        $product = Product::findOrFail($id);
        $category->delete();
        return back()
                ->with('msg', 'Item has edited successfully');
    }
}
