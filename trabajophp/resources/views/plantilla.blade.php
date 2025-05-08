<!-- resources/views/plantilla.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Mi sitio Laravel</title>
</head>
<body>
    <!-- CONTENIDO ESTÁTICO PARA TODAS LAS SECCIONES -->
    <h1>Bienvenid@s a Laravel</h1>
    <hr>

    <!-- MENÚ -->
    <nav>
        <a href="{{ route('noticias') }}">Blog</a> |
        <a href="{{ route('galeria') }}">Fotos</a>
    </nav>

    <!-- CONTENIDO DINÁMICO -->
    <header>
        @yield('apartado')
    </header>
</body>
</html>
