<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $categorias = Categoria::orderBy('cod_categoria', 'DESC')->get();
    return view('categorias.index', ['categorias' => $categorias]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('categorias.create');
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
      'descripcion' => 'required|unique:lib_categoria|min:3|max:100'
    ]);

    Categoria::create($request->all());
    return redirect()->route('categorias.index')->with('success', 'Guardado correctamente');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Categoria  $categoria
   * @return \Illuminate\Http\Response
   * 
   * categoria = select * from lib_categoria where cod_categoria = 12 (esto es lo que hace por detras laravel en el controlador)
   * 
   */
  public function show(Categoria $categoria)
  {
    return view('categorias.show', ['categoria' => $categoria]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Categoria  $categoria
   * @return \Illuminate\Http\Response
   */
  public function edit(Categoria $categoria)
  {
    return view('categorias.edit', ['categoria' => $categoria]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Categoria  $categoria
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Categoria $categoria)
  {
    $request->validate([
      'descripcion' => 'required|min:3|max:100|unique:lib_categoria,cod_categoria'
    ]);

    $categoria->fill($request->only(['descripcion']));

    if ($categoria->isClean()) {
      return back()->with('warning', 'Debe realizar un cambio antes de actualizar');
    }

    $categoria->update($request->all());
    return redirect()->route('categorias.index')->with('success', 'Editado correctamente');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Categoria  $categoria
   * @return \Illuminate\Http\Response
   */
  public function destroy(Categoria $categoria)
  {
    $categoria->delete();
    return back();
  }
}
