@extends('layouts.plantilla')

@section('contingut')
<h3>Alta producte</h3>
<form method="POST" action="{{url('/productes/guardar')}}">
	@csrf
	nom <input type="text" name="nom"><br>
	preu <input type="text" name="preu"><br>
	descripcio <input type="text" name="descripcio"><br>
	<input type="submit" name="balta" value="Desar">
</form>
@endsection