<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use Validator;

class productsControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function productesPreuInferior($preu){

        $productes = Product::where('preu', '<', $preu)->get();

        // No s'ha trobat el producte 
        if ($productes == null) {
            $response = [
                'success' => false,
                'message' => "Productes no trobat",
            ];
            return response()->json($response, 404);
        } else { // El producte s'ha trobat

            $response = [
                'success' => true,
                'data'    => $productes,
                'message' => "Listado productos inferiores al precio",
            ];
            return response()->json($response, 200);
        }

    }
    public function index()
    {
        //
        // Obtenim el llistat de tots els productes
        $productes = Product::all();

        // Es podria retornar directament l'array d'objectes $productes
        // Laravel al fer el return ho converteix directament a format JSON

        // return $productes;

        // Però construirem un JSON una mica més elaborat
        // Definim un array associatiu anomenat response 
        // amb diferents posicions
        $response = [
            'success' => true,  // Per indicar que Tot ha anat bé
            'message' => "Llista productes recuperada", // missatge
            'data' => $productes, // en data posem la llista de productes
        ];

        // convertim l'array associatiu a format JSON i retornem STATUS 200,
        // és a dir, tot ok!
        return response()->json($response, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Cridem a una vista simple anomenenada newFormProduct
        // Serà una vista html creada per poder fer una crida POST d'exemple
        // En una aplicació real la vista contindria javascript per poder
        // recuperar el 
        // json retornat, per comprovar errors de validació ...
        return view('productes.newFormProduct');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // En $input guardem totes les dades que s'han enviat via POST
        $input = $request->all();
        // Creem un validador de les dades enviades, i li passem les regles
        // que volem comprovar
        $validator = Validator::make($input, [
            'nom' => 'required|max:25',
            'preu' => 'required|numeric|min:0',
            'descripcio' => 'required|max:256',
        ]);
        // Si alguna dada no és correcta
        if ($validator->fails()) {

            $response = [
                'success' => false,
                'message' => "Alta incorrecta!",
                'data' => $validator->errors(),
            ];
            // Retornem l'array convertit a JSON i el codi d'error 404 de
            //  HTTTP
            return response()->json($response, 404);
        }
        // Dades POST correctes
        // Desem el nou producte
        $nom = $request->nom;
        $preu = $request->preu;
        $descripcio = $request->descripcio;

        $producte = new Product;
        $producte->nom = $nom;
        $producte->preu = $preu;
        $producte->descripcio = $descripcio;
        $producte->save();
        // Responem a la crida amb un tot ok!
        $response = [
            'success' => true,
            'data'    => $producte,
            'message' => "Alta correcta",

        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //// Busquem un producte en concret segons els seu id
        $producte = Product::find($id);

        // No s'ha trobat el producte 
        if ($producte == null) {
            $response = [
                'success' => false,
                'message' => "Producte no trobat",
            ];
            return response()->json($response, 404);
        } else { // El producte s'ha trobat

            $response = [
                'success' => true,
                'data'    => $producte,
                'message' => "Producte recuperat",
            ];
            return response()->json($response, 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Eliminem el producte segons el codi que ens passin

        // El busquem a la BD
        $producte = Product::find($id);

        // Si no trobem el producte responem amb informació
        // sobre l'error
        if ($producte == null) {
            $response = [
                'success' => false,
                'message' => "Producte no trobat",
            ];
            return response()->json($response, 404);
        } else { // El producte l'hem trobat

            $producte->delete();

            $response = [
                'success' => true,
                'data'    => $producte,
                'message' => "Producte esborrat",
            ];

            return response()->json($response, 200);
        }
    }
}
