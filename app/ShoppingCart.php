<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\InShoppingCart;

class ShoppingCart extends Model
{
    //
    protected $fillable = ["status"];

    //vamos A DEFINIR LAS RELACIONES
    public function inShoppingCarts(){
    	return $this->hasMany("App\InShoppingCart");//Hacemos la relacion con el modelo InShoppingCart
    }

    public function products(){//funcion para devolver todos los productos de shopping carts
    	return $this->belongsToMany('App\Product', 'in_shopping_carts');
    	//relacionamos LA CLASE Product con la tabla pivote "in_shopping_carts"
    }

    public function productsSize(){//funcion que nos dice cuantos productos tenemos en el carrito
    	return $this->products()->count();
    }

    public static function findOrCreateBySessionID($shopping_cart_id){
    	if ($shopping_cart_id) {
    		# Buscar el carrito con este ID
    		return ShoppingCart::findBySession($shopping_cart_id);
    	}else{
    		#crear carrito de compras
    		return ShoppingCart::createWithoutSession();
    	}
    }

    public static function findBySession($shopping_cart_id){//metodo para buscar el carrito
    	return ShoppingCart::find($shopping_cart_id);

    }

    public static function createWithoutSession(){
    	return ShoppingCart::create(["status" => "incompleted"]);//metodo que crea el carrito
    }

    public function total(){
        return $this->products()->sum("pricing");//metodo que suma el total de la compra
    }


}
