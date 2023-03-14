<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Models\category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
{
        $categories = Category::all();
        return view('home', ['categories' => $categories]);
    
}
    
    public function show()
{    $products = Product::all();
    // Laravel will fetch the correct product and return it in the variable $product
    return view('product', ['products'=> $products]);

}
    
}
