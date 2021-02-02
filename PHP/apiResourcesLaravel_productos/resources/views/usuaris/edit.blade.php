@extends('layouts.plantilla')

@section('contingut')
<h3>Editar Usuari</h3>
<form method="POST" action="{{url('/usuaris/actualitzar',$usuari->id)}}">
	@csrf
	nom <input type="text" name="name" value="{{$usuari->name}}"><br>
	email <input type="text" name="email" value="{{$usuari->email}}"><br>
	password <input type="text" name="password" value=""><br>
	<input type="submit" name="bedit" value="Desar">
</form>
@endsection