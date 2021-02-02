@extends('layouts.plantilla')

@section('contingut')

<h3>Alta projecte</h3>
<form method="POST" action="{{url('/projectes/guardar')}}">
    @csrf
    nom <input type="text" name="nom" value="{{old('nom')}}"><br>
    descripcio <input type="text" name="descripcio" value="{{old('descripcio')}}"><br>
    dataInici <input type="date" name="dataInici" value="{{old('dataInici')}}"><br>
    dataFi <input type="date" name="dataFi" value="{{old('dataFi')}}"><br>
    estat <input type="text" name="estat" value="{{old('estat')}}"><br>

    <input type="submit" name="balta" value="Desar">
</form>

<ul>
@foreach ($errors->all() as $message)
    <li>{{ $message }}</li>
@endforeach
</ul>

@endsection