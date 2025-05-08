<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

// Rutas usando controller
Route::get('/', [PagesController::class, 'inicio']);
Route::get('datos', [PagesController::class, 'datos']);
Route::get('cliente/{id?}', [PagesController::class, 'cliente'])->where('id', '[0-9]+');
Route::get('nosotros/{nombre?}', [PagesController::class, 'nosotros'])->name('nosotros');

Route::get('notas', [PagesController::class, 'notas']);
Route::get('notas/{id?}', [PagesController::class, 'detalle'])->name('notas.detalle');

// Vistas estáticas con Blade
Route::view('blog', 'blog')->name('noticias');
Route::view('fotos', 'fotos')->name('galeria');

Route::post('notas', [PagesController::class, 'crear'])->name('notas.crear');

Route::get('editar/{id}', [PagesController::class, 'editar'])->name('notas.editar');
Route::put('editar/{id}', [PagesController::class, 'actualizar'])->name('notas.actualizar');

Route::delete('eliminar/{id}', [PagesController::class, 'eliminar'])->name('notas.eliminar');
