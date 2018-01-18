<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App\Product;//aca importamos el modelo

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::all(); //consulta a la bd para traer todos los productos con el modelo y el metodo all(); guardados en la variable $products
        return view("products.index", ["products" => $products]);//vamos a la carpeta /resources/views/products/index.blade.php
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Formulario para crear productos
        $product = new Product;
        return view("products.create", ["product" => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Funcion de almacenamiento de productos
        $product = new Product;
        $product-> title = $request->title;
        $product-> description = $request->description;
        $product-> pricing = $request->pricing;
        $product-> user_id = Auth::user()->id;

        if($product -> save()){
            return redirect("/products");
        }else{
            return view("products.create", ["product" => $product]);
        }//["product" => $product] sirve para no borrar datos completados cuando se completo mal el formulario
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //para mostrar un unico producto
        $product = Product::find($id);

        return view('products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Formulario para editar los productos
        $product = Product::find($id); //buscamos el id del producto a modificar
        return view("products.edit", ["product" => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Funcion para editar los productos
        $product = Product::find($id);
        $product-> title = $request->title;
        $product-> description = $request->description;
        $product-> pricing = $request->pricing;
        

        if($product -> save()){
            return redirect("/products");
        }else{
            return view("products.edit", ["product" => $product]);
        }//["product" => $product] sirve para no borrar datos completados cuando se completo mal el formulario
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Funcion para eliminar
        Product::destroy($id);
        return redirect('/products');
    }
}
