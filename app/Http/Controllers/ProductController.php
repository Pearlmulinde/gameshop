<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function index()
    {
        $products=Product::all();
        $categories =Category::all();
         
        return view('products',compact('products', 'categories'));
        
    }
    public function create()
    {
        $categories = Category::all();
        return view('products.create',compact('categories'));
    }


    public function store(Request $request)
    {
     $input = $request->all();

     if($request->hasFile('image'))
     {
        $destination_path = 'public/images/products';
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $path = $request->file('image')->storeAs($destination_path, $image_name);
        $input['image'] = $image_name;
     }

     Product::create($input);
     return redirect('/products')->with('success', 'Product created successfully');
    }


    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('products.edit',compact('product','categories'));
    }



    public function update(Request $request, $id)
    {
      $input = $request->all();

      $product = Product::find($id);
      $product->name = $input['name'];
      $product->price = $input['price'];
      $product->category_id = $input['category_id'];

      if($request->hasFile('image'))
      {
        $destination_path = 'public/images/products';
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $path = $request->file('image')->storeAs($destination_path, $image_name);
        $product->image = $image_name;
      }

      $product->save();
      return redirect('/products')->with('success', 'Product updated successfully');
    }
    public function delete($id)
    {
        Product::find($id)->delete();
        return redirect('/products')->with('success', 'Product deleted successfully');
    }
    public function search()
    {
        $search_text = $_GET['query'];
        $products = Product::where('name','LIKE', '%'. $search_text. '%')->with ('category')->get();

        return view('products.search',compact('products'));

    }

    public function show($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id', $category->id)->get();
    
        if (!$category) {
            // Handle the error if the category is not found
            return redirect()->route('categories.index')->with('error', 'Category not found');
        }
    
        return view('products.show', compact('category', 'products'));
    }
}
