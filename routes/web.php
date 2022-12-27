<?php

use App\Http\Controllers\AutorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\SexoController;
use App\Models\Libro;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
})->name('main');

Route::get('libros/favoritos', function () {
    $librosFavoritos = Libro::all();
    return view('favoritos.index', ['librosFavoritos' => $librosFavoritos]);
})->name('listarFavoritos');

Route::resource('sexos', SexoController::class);
Route::resource('idiomas', IdiomaController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('libros', LibroController::class);
Route::put('libros/{libro}', [LibroController::class, 'favorito'])->name('añadirFavorito');
Route::resource('autores', AutorController::class)->parameters([
    'autores' => 'autor'
]);
