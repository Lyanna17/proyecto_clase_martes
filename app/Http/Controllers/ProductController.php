<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        return "LISTADO DE PRODUCTOS";
    }

    public function create(){

        return "CREAR PRODUCTO";

    }

    public function show($id, $categoria = null){

        if ($categoria == null){
            return "Producto: ". $id;
        }
        else{
            return "Producto: ". $id . "Categoria: ". $categoria;
        }
    }
}
