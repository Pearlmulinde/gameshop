<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

 
class CartController extends Controller
{   
    public function addProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $cart = Session::get('cart', []);
        $cart[$product->id] = [
            'product' => $product,
            'quantity' => $request->quantity,
        ];
        Session::put('cart', $cart);
        return redirect()->route('cart');
    }

    public function show(Request $request)
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return view('cart', ['products' => []]);
        }

        $products = collect($cart)->map(function ($item) {
            return $item['product'];
        });

        $totalCost = $products->sum(function ($product) {
            return $product->price * $product['quantity'];
        });

        return view('cart', compact('products', 'totalCost', 'product'));
    }
}



