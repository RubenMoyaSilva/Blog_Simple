<?php

// app/Http/Controllers/PagesController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;



class PagesController extends Controller {
    
    public function eliminar($id) {
        // Buscar la nota por su ID o devolver error 404 si no existe
        $notaEliminar = Nota::findOrFail($id);
    
        // Eliminar la nota
        $notaEliminar->delete();
    
        // Redirigir de nuevo con un mensaje de éxito
        return back()->with('mensaje', 'Nota Eliminada');
    }
    
    public function editar($id) {
        $nota = Nota::findOrFail($id);  // Buscar la nota por su ID
        return view('notas.editar', compact('nota'));  // Pasar la nota a la vista
    }
    
    public function actualizar(Request $request, $id) {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required'
        ]);
    
        // Encontrar la nota que se va a actualizar
        $notaActualizar = Nota::findOrFail($id);
    
        // Actualizar los campos de la nota
        $notaActualizar->nombre = $request->nombre;
        $notaActualizar->descripcion = $request->descripcion;
    
        // Guardar los cambios en la base de datos
        $notaActualizar->save();
    
        // Redirigir con un mensaje de éxito
        return back()->with('mensaje', 'Nota actualizada');
    }
    public function notas() {
        $notas = Nota::paginate(5);
        return view('notas', compact('notas'));
    }
    
    public function detalle($id) {
        $nota = Nota::findOrFail($id);
        return view('notas.detalle', compact('nota'));
    }

    public function inicio() {
        return view('welcome');
    }

    public function datos() {
        return view('usuarios', ['id' => 56]);
    }

    public function cliente($id = 1) {
        return "Cliente con el id: " . $id;
    }

    public function nosotros($nombre = null) {
        $equipo = ['Paco', 'Enrique', 'Maria', 'Veronica'];
        return view('nosotros', compact('equipo', 'nombre'));
    }
    public function crear(Request $request)
{
    // Validar los datos recibidos
    $request->validate([
        'nombre' => 'required',
        'descripcion' => 'required',
        'autor' => 'nullable', // Autor es opcional, pero puedes agregar reglas como 'string', 'max:255', etc.
    ]);

    // Crear la nueva nota
    $notaNueva = new Nota;
    $notaNueva->nombre = $request->nombre;
    $notaNueva->descripcion = $request->descripcion;
    $notaNueva->autor = $request->autor;
    $notaNueva->save();

    return back()->with('mensaje', 'Nota agregada exitosamente');

}

}
