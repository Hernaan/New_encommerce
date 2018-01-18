<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;


class MainController extends Controller
{
    //la ruta donde se usa esta funcion esta en routes/web.php
    public function home(){

    	return view('main.home');
    	}
}
