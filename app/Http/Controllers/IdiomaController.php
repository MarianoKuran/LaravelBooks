<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $idiomas = Idioma::orderBy('cod_idioma', 'DESC')->get();
    return view('idiomas.index', ['idiomas' => $idiomas]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('idiomas.create');
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
      'descripcion' => 'required|unique:lib_idioma|min:3|max:100'
    ]);

    Idioma::create($request->all());
    return redirect()->route('idiomas.index')->with('success', 'Guardado correctamente');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\idioma  $idioma
   * @return \Illuminate\Http\Response
   * 
   * sexo = select * from lib_idioma where cod_idioma = 12 (esto es lo que hace por detras laravel en el controlador)
   * 
   */
  public function show(Idioma $idioma)
  {
    return view('idiomas.show', ['idioma' => $idioma]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\idioma  $idioma
   * @return \Illuminate\Http\Response
   */
  public function edit(Idioma $idioma)
  {
    return view('idiomas.edit', ['idioma' => $idioma]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\idioma  $idioma
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Idioma $idioma)
  {
    $request->validate([
      'descripcion' => 'required|min:3|max:100|unique:lib_idioma,cod_idioma'
    ]);

    $idioma->fill($request->only(['descripcion']));

    if ($idioma->isClean()) {
      return back()->with('warning', 'Debe realizar un cambio antes de actualizar');
    }

    $idioma->update($request->all());
    return redirect()->route('idiomas.index')->with('success', 'Editado correctamente');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\idioma  $idioma
   * @return \Illuminate\Http\Response
   */
  public function destroy(Idioma $idioma)
  {
    $idioma->delete();
    return back();
  }
}
