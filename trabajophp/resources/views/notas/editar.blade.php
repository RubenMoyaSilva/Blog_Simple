@extends('plantilla')

@section('apartado')

<h2>Editando la nota {{ $nota->id }}</h2>

@if (session('mensaje'))
    <div class="alert alert-success">{{ session('mensaje') }}</div>
@endif

<form action="{{ route('notas.actualizar', $nota->id) }}" method="POST">
    @method('PUT') <!-- Necesitamos cambiar al método PUT para editar -->
    @csrf <!-- Token CSRF para proteger el formulario -->

    @error('nombre')
        <div class="alert alert-danger">El nombre es obligatorio</div>
    @enderror
    @error('descripcion')
        <div class="alert alert-danger">La descripción es obligatoria</div>
    @enderror

    <input type="text" name="nombre" class="form-control mb-2" value="{{ old('nombre', $nota->nombre) }}" placeholder="Nombre de la nota" autofocus>
    <input type="text" name="descripcion" class="form-control mb-2" value="{{ old('descripcion', $nota->descripcion) }}" placeholder="Descripción de la nota">

    <button class="btn btn-primary btn-block" type="submit">Guardar cambios</button>
</form>

@endsection
