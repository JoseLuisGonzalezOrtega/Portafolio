@extends('layouts.plantilla')

@section('contingut')
	<h3>Llistat: Usuaris</h3>
	<a href="{{url('/usuaris/afegir')}}">Afegir Usuari</a>
	<table>
		<tr><td>Codi</td><td>Nom</td><td>email</td><td>password</td>
			<td>Operacions</td></tr>

		
		@foreach($usuaris as $usuari) 
			<tr>
    		<td> {{$usuari->id}}</td>
    		<td> {{$usuari->name}}</td>  
    		<td> {{$usuari->email}}</td>   
    		<td> {{$usuari->password}}</td> 
    		<td> <a href="{{url('/usuaris/esborrar',$usuari->id)}}">Esborrar</a></td>		
    		<td> <a href="{{url('/usuaris/actualitzar',$usuari->id)}}">Editar</a></td>		
    		</tr>
    	@endforeach
    	
	</table>
	{{ $usuaris->links() }}
	@if(session('status'))
	  {{session('status')}}
    @endif
@endsection