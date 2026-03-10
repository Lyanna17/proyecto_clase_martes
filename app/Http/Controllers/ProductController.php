<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $productList = Product::paginate(9);

        return view('product.index', ['miLista' => $productList]);
    }

    public function create(){

        $categories = Category::all();
        return view('product.create',['myCategories' => $categories]);

    }

    public function store(Request $request){

        //VALIDACIONES

        $request-> validate([
            'nombre' => 'required|min:5|max:255',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'categoria' => 'required|exists:categories, id',
            'imagen' => 'required|image',
        ]);


        $newProduct = new Product();
        $newProduct->name= $request->get('nombre');
        $newProduct->desciption = $request->get('descripcion');
        $newProduct->price = $request->get('precio');
        $newProduct->category_id = $request->get('categoria');

        if($request->hasFile('imagen')){

            $ruta = $request->file('imagen')->store('imagenes', 'public');
            $newProduct->image = $ruta;

        }else{
            $newProduct->image = "NO hay ruta";
        }
        

        $newProduct->save();

        return redirect()->route('product.index');
    }

    public function show($id){

        return view('product.show');
        
    }

    public function destroy(Product $product){

        $product->delete();
        return redirect()->route('product.index');
    }
}
