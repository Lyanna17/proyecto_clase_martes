<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        $total = array_sum(array_column($cart, 'price'));
        return view('cart.cart', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $productId = $request->product_id;
        $product = Product::findOrFail($productId);
        $cart = session('cart', []);
        
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1
            ];
        }
        
        session(['cart' => $cart]);
        return response()->json(['success' => true, 'totalItems' => array_sum(array_column($cart, 'quantity'))]);
    }

    public function remove(Request $request)
    {
        $productId = $request->product_id;
        $cart = session('cart', []);
        unset($cart[$productId]);
        session(['cart' => $cart]);
        return response()->json(['success' => true]);
    }
}
