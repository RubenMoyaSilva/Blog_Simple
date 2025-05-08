
@extends('plantilla')

@section('apartado')
    <h2>Equipo:</h2>
    @foreach($equipo as $miembro)
        <p>{{ $miembro }}</p>
    @endforeach

    @if ($nombre)
        <p>Nombre recibido por parámetro: {{ $nombre }}</p>
    @endif
@endsection
