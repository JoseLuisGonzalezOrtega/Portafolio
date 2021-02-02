<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class projectsController extends Controller
{
    //
    public function llistat() {    	
    	$projects = Project::paginate(5);
    	return view('projects.llistat',["projects"=>$projects]);   	
    }

    public function formAdd() {

    	return view('projects.alta');
    }

    public function add(Request $request) {
   	
   		$messages = [
        'required' => 'El camp :attribute és obligatori.',
        'date' => 'El camp :attribute ha de ser una data correcte',
        'dataInici.after' => 'La data d\'inici ha de ser posterior al dia d\'avui',
        'dataFi.after' => 'La data final ha de ser posterior a la data d\'inici',
        'estat.integer'=>'Estat ha de ser un enter positiu',
        'estat.min'=>'Estat ha de ser un enter entre 1 i 3',
        'estat.max'=>'Estat ha de ser un enter entre 1 i 3',
        ];

    	$request->validate([
        'nom' => 'required',
        'descripcio' => 'required',
        'dataInici' => 'required|date|after:now',
        'dataFi' => 'required|date|after:dataInici',
        'estat' => 'required|integer|min:1|max:3',
        ],$messages);

    	$nom = $request->nom;   	
        $descripcio = $request->descripcio;
        $dataInici = $request->dataInici;
        $dataFi = $request->dataFi;
        $estat = $request->estat;

        $project = new Project;
      
        
    	$project->nom = $nom;
        $project->descripcio = $descripcio;
        $project->dataInici = $dataInici;
        $project->dataFi = $dataFi;
        $project->estat = $estat;

        

        
    	$project->save();
    	return redirect('/projectes')->with('status','Alta correcta');

    }

    public function delete($id) {
    	
    	$project = Project::findOrFail($id);
    	$project->delete();
    	return redirect('/projectes')->with('status','Projecte esborrat');

    }

    public function formEdit($id) {
    	$project = Project::findOrFail($id);

    	return view('projects.edit',['project'=>$project]);
    }

    public function edit(Request $request, $id) {
        
        $project = Project::findOrFail($id);
        $messages = [
        'required' => 'El camp :attribute és obligatori.',
        'date' => 'El camp :attribute ha de ser una data correcte',
        'dataInici.after' => 'La data d\'inici ha de ser posterior al dia d\'avui',
        'dataFi.after' => 'La data final ha de ser posterior a la data d\'inici',
        'estat.integer'=>'Estat ha de ser un enter positiu',
        'estat.min'=>'Estat ha de ser un enter entre 1 i 3',
        'estat.max'=>'Estat ha de ser un enter entre 1 i 3',
        ];

    	$request->validate([
        'nom' => 'required',
        'descripcio' => 'required',
        'dataInici' => 'required|date|after:now',
        'dataFi' => 'required|date|after:dataInici',
        'estat' => 'required|integer|min:1|max:3',
        ],$messages);
        
        $nom = $request->nom;   	
        $descripcio = $request->descripcio;
        $dataInici = $request->dataInici;
        $dataFi = $request->dataFi;
        $estat = $request->estat;

    	$project->nom = $nom;
        $project->descripcio = $descripcio;
        $project->dataInici = $dataInici;
        $project->dataFi = $dataFi;
        $project->estat = $estat;

        $project->save();
    	return redirect('/projectes')->with('status','Actualització correcta');
    }

    
}
