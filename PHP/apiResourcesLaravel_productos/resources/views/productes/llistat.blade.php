@extends('layouts.plantilla')

@section('contingut')
	<h3>Llistat: Productes</h3>
	<a href="{{url('/productes/afegir')}}">Afegir producte</a>
	<table>
		<tr><td>Nom</td><td>Descripcio</td><td>Preu</td>
			<td>Operacions</td></tr>

		
		@foreach($productes as $producte) 
			<tr>
    		<td> {{$producte->id}}</td>
    		<td> {{$producte->nom}}</td>  
    		<td> {{$producte->preu}}</td>    
    		<td> <a href="{{url('/productes/esborrar',$producte->id)}}">Esborrar</a></td>		
    		<td> <a href="{{url('/productes/actualitzar',$producte->id)}}">Editar</a></td>		
    		</tr>
    	@endforeach
    	
	</table>
	{{ $productes->links() }}
	@if(session('status'))
	  {{session('status')}}
    @endif
@endsection