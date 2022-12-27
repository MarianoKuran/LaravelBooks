@extends('main')

@section('content')
<div class="container">
  @if (session('warning'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session('warning') }}
  </div>
  @endif
  <div class="row">
    <div class="col-md-12">
      <div class="pull-right">
        <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('libros.index') }}">
          <i class="fa fa-home fa-fw"></i>
        </a>
      </div>
    </div>
    <div class="col-md-12">
      <form action="{{ route('libros.update', $libro) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')
        <div class="col-md-6">
          <div class="mb-2">
            <label for="titulo" class="form-label">Titulo del libro</label>
            <input type="text" class="form-control shadow-none" id="titulo" name="titulo" value="{{ old('titulo', $libro->titulo) }}">
            @error('titulo')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mb-2">
            <label for="descripcion" class="form-label">Descripcion del libro</label>
            <input type="text" class="form-control shadow-none" id="descripcion" name="descripcion" value="{{ old('descripcion', $libro->descripcion) }}">
            @error('descripcion')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mb-2">
            <label for="fecha_de_publicacion" class="form-label">Fecha de publicacion del libro</label>
            <input type="date" class="form-control shadow-none" id="fecha_de_publicacion" name="fecha_de_publicacion" value="{{ old('fecha_de_publicacion', $libro->fecha_de_publicacion) }}">
            @error('fecha_de_publicacion')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-success">Actualizar</button>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection