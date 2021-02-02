<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class usersController extends Controller
{
    //
     //
    public function llistat() {    	
    	$usuaris = User::paginate(5);
    	return view('usuaris.llistat',["usuaris"=>$usuaris]);   	
    }

    public function formAdd() {
    	
    	return view('usuaris.alta');
    }

    public function add(Request $request) {
    	
    	$name = $request->name;
    	$email = $request->email;
    	$password = $request->password;

    	$usuari = new User;
    	$usuari->name = $name;
    	$usuari->email = $email;
    	$usuari->password = Hash::make($password);
    	$usuari->save();
    	return redirect('/usuaris')->with('status','Alta correcta');

    }

    public function delete($id) {
    	
    	$usuari = User::findOrFail($id);
    	$usuari->delete();
    	return redirect('/usuaris')->with('status','Usuari esborrat');

    }

     public function formEdit($id) {
    	$usuari = User::findOrFail($id);

    	return view('usuaris.edit',['usuari'=>$usuari]);
    }



    public function edit(Request $request, $id) {
        
        $usuari = User::findOrFail($id);
        
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $usuari->name = $name;
        $usuari->email = $email;
        if($password!="") $usuari->password = Hash::make($password);
        $usuari->save();
    	return redirect('/usuaris')->with('status','Actualització correcta');
    }
}
