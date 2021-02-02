@extends('layouts.plantilla')

@section('contingut')
<h3>Editar producte</h3>
<form method="POST" action="{{url('/productes/actualitzar',$producte->id)}}">
	@csrf
	nom <input type="text" name="nom" value="{{$producte->nom}}"><br>
	preu <input type="text" name="preu" value="{{$producte->preu}}"><br>
	descripcio <input type="text" name="descripcio" value="{{$producte->descripcio}}"><br>
	<input type="submit" name="bedit" value="Desar">
</form>
@endsection