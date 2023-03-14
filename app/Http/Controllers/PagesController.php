<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product; 
use App\Models\Cart;
use Session;

class PagesController extends Controller
{
    public function home(){
        $categories = Category::all();
    
        return view('home', ['categories' => $categories]);
    }
     
    public function products($id){
        
        $category = Category::findOrFail($id);
        // $category->load('products');
        $products = Product::where('category_id', $id)->get();
    
        return view('products', 
        [
            'category' => $category,
            'products' => $products
        ]);
    }

    public function detail(Request $request, $category_id, $product_id){
       
        $category = Category::find($category_id);
      
        $product = Product::find($product_id);
        
        return view('detail', 
        [
            
            'category' => $category,
            'product' => $product
        ]);
        
    }
}
