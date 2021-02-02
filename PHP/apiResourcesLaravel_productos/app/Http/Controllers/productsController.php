<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class productsController extends Controller
{
    //
    public function llistat() {    	
    	$productes = Product::paginate(5);
    	return view('productes.llistat',["productes"=>$productes]);   	
    }

    public function formAdd() {
    	// echo "form alta";
    	return view('productes.alta');
    }

    public function add(Request $request) {
    	
    	$nom = $request->nom;
    	$preu = $request->preu;
    	$descripcio = $request->descripcio;

    	$producte = new Product;
    	$producte->nom = $nom;
    	$producte->preu = $preu;
    	$producte->descripcio = $descripcio;
    	$producte->save();
    	return redirect('/productes')->with('status','Alta correcta');

    }

    public function delete($id) {
    	
    	$producte = Product::findOrFail($id);
    	$producte->delete();
    	return redirect('/productes')->with('status','Producte esborrat');

    }

     public function formEdit($id) {
    	$producte = Product::findOrFail($id);

    	return view('productes.edit',['producte'=>$producte]);
    }



    public function edit(Request $request, $id) {
        
        $producte = Product::findOrFail($id);
        
        $nom = $request->nom;
        $preu = $request->preu;
        $descripcio = $request->descripcio;

        $producte->nom = $nom;
        $producte->preu = $preu;
        $producte->descripcio = $descripcio;
        $producte->save();
    	return redirect('/productes')->with('status','Actualització correcta');
    }
}
