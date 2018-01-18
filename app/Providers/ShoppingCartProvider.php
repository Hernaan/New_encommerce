<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ShoppingCart;//importamos el modelo

class ShoppingCartProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer("*",function($view){//funcion que muestra el carrito en todos los templates
            $shopping_cart_id = \Session::get('shopping_cart_id');//pregunta si tiene una sesion para el carrito

            $shopping_cart = ShoppingCart::findOrCreateBySessionID($shopping_cart_id);//se crea el carrito

            \Session::put("shopping_cart_id", $shopping_cart->id);//se guarda el carrito en la sesion

            $view->with("shopping_cart", $shopping_cart);//indicamos que muestre el carrito en todas las vistas
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
