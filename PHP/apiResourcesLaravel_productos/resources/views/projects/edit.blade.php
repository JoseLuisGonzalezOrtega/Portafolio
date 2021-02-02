@extends('layouts.plantilla')

@section('contingut')
<h3>Editar projecte</h3>
<form method="POST" action="{{url('/projectes/actualitzar',$project->id)}}">
    @csrf
    nom <input type="text" name="nom" value="{{$project->nom}}"><br>
    descripcio <input type="text" name="descripcio" value="{{$project->descripcio}}"><br>
    dataInici <input type="text" name="dataInici" value="{{$project->dataInici}}"><br>
    dataFi <input type="text" name="dataFi" value="{{$project->dataFi}}"><br>
    estat <input type="text" name="estat" value="{{$project->estat}}"><br>

    <input type="submit" name="balta" value="Desar">
</form>

<ul>
@foreach ($errors->all() as $message)
    <li>{{ $message }}</li>
@endforeach
</ul>
@endsection