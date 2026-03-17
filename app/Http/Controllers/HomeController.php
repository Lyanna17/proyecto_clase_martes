<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    $featured = Product::with('category')->limit(8)->get();
    $deals = Product::with('category')->orderBy('price')->limit(6)->get();
    $totalProducts = Product::count(); // ← Conteo aquí
    
    return view('welcome', compact('featured', 'deals', 'totalProducts'));
    }
}
