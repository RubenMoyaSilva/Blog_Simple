<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if (session('mensaje'))
    <div class="mensaje-nota-creada">
        {{ session('mensaje') }}
    </div>
@endif
<h1>Notas desde base de datos</h1>

<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($notas as $nota)
        <tr>
            <td>{{ $nota->nombre }}</td>
            <td>{{ $nota->descripcion }}</td>
        </tr>
        <a href="{{ route('notas.editar', $nota->id) }}" class="btn btn-warning btn-sm">Editar</a>
        <form action="{{ route('notas.eliminar', $nota->id) }}" method="POST" class="d-inline">
        @method('DELETE')  <!-- Para indicar que el formulario usa el método DELETE -->
        @csrf  <!-- Token CSRF para proteger el formulario -->
            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
        </form>

        @endforeach
    </tbody>
</table>
<div class="pagination">
    {{ $notas->links() }}
</div>
<form action="{{ route('notas.crear') }}" method="POST">
    @csrf
    <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control mb-2" placeholder="Nombre de la nota" autofocus>
    @error('nombre')
        <div class="alert alert-danger">No olvides rellenar el nombre</div>
    @enderror

    <input type="text" name="descripcion" value="{{ old('descripcion') }}" class="form-control mb-2" placeholder="Descripción de la nota">
    @error('descripcion')
        <div class="alert alert-danger">No olvides rellenar la descripción</div>
    @enderror

    <input type="text" name="autor" value="{{ old('autor') }}" class="form-control mb-2" placeholder="Autor de la nota">
    @error('autor')
        <div class="alert alert-danger">Por favor, ingresa el nombre del autor (si aplica)</div>
    @enderror

    <button class="btn btn-primary btn-block" type="submit">Crear nueva nota</button>
</form>

</body>
</html>