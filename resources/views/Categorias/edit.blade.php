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
        <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('categorias.index') }}">
          <i class="fa fa-home fa-fw"></i>
        </a>
      </div>
    </div>
    <div class="col-md-12">
      <form action="{{ route('categorias.update', $categoria) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')
        <div class="col-md-6">
          <label for="descripcion" class="form-label">Descripción de Categorias</label>
          <input type="text" class="form-control shadow-none" id="descripcion" name="descripcion" value="{{ old('descripcion', $categoria->descripcion) }}">
          @error('descripcion')
          <small class="text-danger">
            {{ $message }}
          </small>
          @enderror
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-success">Actualizar</button>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection