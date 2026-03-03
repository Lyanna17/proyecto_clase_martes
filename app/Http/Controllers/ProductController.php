<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $productList = Product::all();

        return view('product.index', ['miLista' => $productList]);
    }

    public function create(){

        $categories = Category::all();
        return view('product.create',['myCategories' => $categories]);

    }

    public function store(Request $request){

        $newProduct = new Product();
        $newProduct->name= $request->get('nombre');
        $newProduct->desciption = $request->get('descripcion');
        $newProduct->price = $request->get('precio');
        $newProduct->category_id = $request->get('categoria');

        $newProduct->save();

        return redirect()->route('product.index');
    }

    public function show($id){

        return view('product.show');
        
    }
}
