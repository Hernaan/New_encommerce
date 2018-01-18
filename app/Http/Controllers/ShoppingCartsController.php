<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ShoppingCart;

class ShoppingCartsController extends Controller
{
    //
    public function index(){
    	$shopping_cart_id = \Session::get('shopping_cart_id');//pregunta si tiene una sesion para el carrito

        $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);//se crea el carrito

        $products = $shopping_cart->products()->get();//extraemos los productos del carrito

        $total = $shopping_cart->total();//total a pagar 

        return view("shopping_carts.index", ["products" => $products, "total" => $total]);//retornamos la vista
    }
}
