@extends('plantilla')

@section('apartado')
    <h1>Detalle de la nota</h1>
    <h3>ID: {{ $nota->id }}</h3>
    <h3>Nombre: {{ $nota->nombre }}</h3>
    <h3>Descripción: {{ $nota->descripcion }}</h3>
@endsection