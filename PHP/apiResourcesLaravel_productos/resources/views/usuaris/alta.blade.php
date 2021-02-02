@extends('layouts.plantilla')

@section('contingut')
<h3>Alta usuari</h3>
<form method="POST" action="{{url('/usuaris/guardar')}}">
	@csrf
	nom <input type="text" name="name"><br>
	email <input type="text" name="email"><br>
	password <input type="text" name="password"><br>
	<input type="submit" name="balta" value="Desar">
</form>
@endsection