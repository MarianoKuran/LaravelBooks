@extends('main')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="pull-right">
        <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('autores.index') }}">
          <i class="fa fa-home fa-fw"></i>
        </a>
      </div>
    </div>
    <div class="col-md-12">
      <form action="{{ route('autores.store') }}" method="POST" class="row g-3">
        @csrf
        <div class="col-md-6">
          <div class="mb-2">
            <label for="nombres" class="form-label">Nombres del autor</label>
            <input type="text" class="form-control shadow-none" id="nombres" name="nombres" value="{{ old('nombres') }}">
            @error('nombres')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mb-2">
            <label for="apellidos" class="form-label">Apellidos del autor</label>
            <input type="text" class="form-control shadow-none" id="apellidos" name="apellidos" value="{{ old('apellidos') }}">
            @error('apellidos')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <label for="sexo" class="form-label mt-4">Sexo de Autor</label>
          <div class="mb-2">
            <select name="cod_sexo" value="{{ old('cod_sexo') }}">
              <option disabled selected>Elegir sexo</option>
              @foreach ($sexos as $sexo)
              <option value="{{ $sexo->cod_sexo }}">{{ $sexo->descripcion }}</option>
              @endforeach
            </select>
            @error('sexo')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection