@extends('layouts.plantilla')

@section('contingut')
	<h3>Llistat: Projectes</h3>
	<a href="{{url('/projectes/afegir')}}">Afegir Projecte</a>
	<table>
		<tr><td>Codi</td><td>Nom</td><td>descripcio</td><td>dataInici</td><td>dataFi</td><td>estat</td>
			<td>Operacions</td></tr>

		
		@foreach($projects as $project) 
			<tr>
    		<td> {{$project->id}}</td>
    		<td> {{$project->nom}}</td>  
    		<td> {{$project->descripcio}}</td>   
			<td> {{$project->dataInici}}</td> 
			<td> {{$project->dataFi}}</td> 
			<td> {{$project->estat}}</td> 
    		<td> <a href="{{url('/projectes/esborrar',$project->id)}}">Esborrar</a></td>		
    		<td> <a href="{{url('/projectes/actualitzar',$project->id)}}">Editar</a></td>		
    		</tr>
    	@endforeach
    	
	</table>
	{{ $projects->links() }}
	

	

	@if(session('status'))
	  {{session('status')}}
    @endif
@endsection