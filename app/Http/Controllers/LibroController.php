<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Idioma;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $libros = Libro::orderBy('cod_libro', 'DESC')->get();
    return view('libros.index', ['libros' => $libros]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $idiomas = Idioma::all();
    $categorias = Categoria::all();
    $autores = Autor::all();
    return view('libros.create', ['idiomas' => $idiomas, 'autores' => $autores, 'categorias' => $categorias]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
      'titulo' => 'required|unique:lib_libro|min:3|max:100',
      'descripcion' => 'required|unique:lib_libro|min:3|max:100',
      'portada' => 'required|image',
      'fecha_de_publicacion' => 'required',
      'autores' => 'required',
      'categorias' => 'required',
      'cod_idioma' => 'required',
    ]);

    $imagen = $request->file('portada')->store('public/imagenes');
    $url = Storage::url($imagen);

    $libro = Libro::create([
      'titulo' => $request->titulo,
      'descripcion' => $request->descripcion,
      'portada' => $url,
      'fecha_de_publicacion' => $request->fecha_de_publicacion,
      'cod_idioma' => $request->cod_idioma,
    ]);

    $libro->categorias()->sync($request->categorias);
    $libro->autores()->sync($request->autores);


    return redirect()->route('libros.index')->with('success', 'Guardado correctamente');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Autor  $autor
   * @return \Illuminate\Http\Response
   */
  public function show(Libro $libro)
  {
    return view('libros.show', ['libro' => $libro]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Autor  $autor
   * @return \Illuminate\Http\Response
   */
  public function edit(Libro $libro)
  {
    return view('libros.edit', ['libro' => $libro]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\libro  $libro
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Libro $libro)
  {
    $request->validate([
      'titulo' => 'required|min:3|max:100|unique:lib_libro,cod_libro',
      'descripcion' => 'required|min:3|max:100|unique:lib_libro,cod_libro',
      'portada' => 'required|unique:lib_libro|min:3',
      'fecha_de_publicacion' => 'required',
      'cod_idioma' => 'required',
      'categorias' => 'required',
      'cod_idioma' => 'required',
    ]);

    $libro->fill($request->only(['titulo', 'descripcion', 'fecha_de_publicacion', 'portada', 'cod_idioma']));

    if ($libro->isClean()) {
      return back()->with('warning', 'Debe realizar un cambio antes de actualizar');
    }

    $libro->update($request->all());
    return redirect()->route('libros.index')->with('success', 'Editado correctamente');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\libro  $libro
   * @return \Illuminate\Http\Response
   */
  public function destroy(Libro $libro)
  {
    $libro->delete();
    return back();
  }

  public function favorito(Libro $libro)
  {
    
    if ($libro->favoritos == 1) {
      $libro->favoritos = 0;
      $libro->save();
      return redirect()->route('libros.index')->with('success', 'Se quitó de tus libros favoritos');
    } else {
      $libro->favoritos = 1;
      $libro->save();
      return redirect()->route('libros.index')->with('success', 'Se agregó a tus libros favoritos');
    }
  }
  public function busqueda(Request $request)
  {
    $busqueda = $request->q;
    $result = Libro::where('titulo', 'like', "%$busqueda%")->orWhere('descripcion', 'like', "%$busqueda%")->get();
    return response()->json($result);
  }
}
