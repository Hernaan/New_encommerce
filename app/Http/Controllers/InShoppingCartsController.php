<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InShoppingCart;
use App\ShoppingCart;
class InShoppingCartsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $shopping_cart_id = \Session::get('shopping_cart_id');//pregunta si tiene una sesion para el carrito

        $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);//se crea el carrito

        $response = InShoppingCart::create([
            "shopping_cart_id" => $shopping_cart->id,
            "product_id" => $request->product_id
        ]);//llamamos al modelo y le pasamos los datos para crear

        if($response){//cambiar a "false" para que no redirija al carrito
            return redirect('/carrito');//redirecciona al carrito

        }else{
            return back();//si la respuesta no fue exitosa retorna atras
        }

        //protected $fillable = ["product_id", "shopping_car_id"]; esto se agrega para que funcione en el modelo InShoppingCart para que no se llene campos que no quiera
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        //
    }
}
