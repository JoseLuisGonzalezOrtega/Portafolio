<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class provaController extends Controller
{
    //
    public function hola() {
    	echo "provant metode en controlador";
    }

    public function saluda($usuari) {
    	//echo $usuari;
    	return view("prova",['usuari'=>$usuari]);
    }

    public function producte($codi=null) {
    	 return "hola! has posat ".$codi;
    }

}
