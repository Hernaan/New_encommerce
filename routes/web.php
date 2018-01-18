	<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@home');//llamamos al controlador y al metodo "home" 
Route::get('/carrito', 'ShoppingCartsController@index');
Auth::routes();

//los resource son rustas REST
Route::resource('products', 'ProductsController');
/* 
GET/products => index
POST/products => store
GET/products/create => Formulario para crear
GET/products/:id => Mostrar un producto con ID
GET/products/:id/edit => Formulario de edicion
PUTH/PATCH /products/:id => Actualiza el producto
DELETE/products/:id => elimina el producto
*/


Route::resource('in_shopping_carts', 'InShoppingCartsController',[
	'only' => ['store', 'destroy']//especificamos solo las funciones que vamos a utilizar en el controlador que son los de abajo
	/*
		POST/products => store
		DELETE/products/:id => elimina el producto
	*/


	]);


Route::get('/home', 'HomeController@index')->name('home');
