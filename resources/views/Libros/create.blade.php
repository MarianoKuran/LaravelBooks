@extends('main')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="pull-right">
        <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Inicio" href="{{ route('libros.index') }}">
          <i class="fa fa-home fa-fw"></i>
        </a>
      </div>
    </div>
    <div class="col-md-12">
      <form action="{{ route('libros.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
          <div class="mb-2">
            <label for="titulo" class="form-label">Titulo del libro</label>
            <input type="text" class="form-control shadow-none" id="titulo" name="titulo" value="{{ old('titulo') }}">
            @error('titulo')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mb-2">
            <label for="descripcion" class="form-label">Descripcion del libro</label>
            <input type="text" class="form-control shadow-none" id="descripcion" name="descripcion" value="{{ old('descripcion') }}">
            @error('descripcion')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mb-2">
            <label for="portada" class="form-label">Portada del libro</label>
            <input type="file" class="form-control shadow-none" id="portada" name="portada" accept="image/*">
            @error('portada')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <div class="mb-2">
            <label for="fecha_de_publicacion" class="form-label">Fecha de publicacion del libro</label>
            <input type="date" class="form-control shadow-none" id="fecha_de_publicacion" name="fecha_de_publicacion" value="{{ old('fecha_de_publicacion') }}">
            @error('fecha_de_publicacion')
            <small class="text-danger">{{ $message }}</small>
            @enderror
          </div>
          <select name="cod_idioma" value="{{ old('cod_idioma') }}">
            <option disabled selected>Elegir Idioma</option>
            @foreach ($idiomas as $idioma)
            <option value="{{ $idioma->cod_idioma }}">{{ $idioma->descripcion }}</option>
            @endforeach
          </select>
          @error('cod_idioma')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="col-md-6">
          <label for="categorias" class="form-label">Categorías</label><br>
          @if(sizeof($categorias) > 0)
          @foreach ($categorias as $categoria)
          <input type="checkbox" value="{{ $categoria->cod_categoria }}" name="categorias[]" {{ ( is_array(old('categorias') ) && in_array($categoria->cod_categoria, old('categorias')) ) ? 'checked ' : '' }}>
          {{ $categoria->descripcion }}
          @endforeach
          <br>
          @error('categorias')
          <small class="text-danger" role="alert">
            {{ $message }}
          </small>
          @enderror
          @else
          <div class="alert alert-secondary">No se encontraron resultados.</div>
          @error('categorias')
          <small class="text-danger" role="alert">
            {{ $message }}
          </small>
          @enderror
          @endif
        </div>
        <div class="col-md-6">
          <label for="autores" class="form-label">Autores</label><br>
          @if(sizeof($autores) > 0)
          @foreach ($autores as $autor)
          <input type="checkbox" value="{{ $autor->cod_autor }}" name="autores[]" {{ ( is_array(old('autores') ) && in_array($autor->cod_autor, old('autores')) ) ? 'checked ' : '' }}>
          {{ $autor->nombre_completo }}
          @endforeach
          <br>
          @error('autores')
          <small class="text-danger" role="alert">
            {{ $message }}
          </small>
          @enderror
          @else
          <div class="alert alert-secondary">No se encontraron resultados.</div>
          @error('autores')
          <small class="text-danger" role="alert">
            {{ $message }}
          </small>
          @enderror
          @endif
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
  console.log('hola')

  function getUrl() {
    var inputFile = document.getElementById('portada');
    var url = document.getElementById('portada').files[0].name;

    console.log(url)
    /* inputFile.setAttribute('value', url); */
  }
</script>
@endsection