@extends('main')

@section('content')
<div class="table-responsive">
  @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
  </div>
  @endif
  <table class="table table-hover">
    <thead>
      <div class="col-md-12">
        <div class="pull-right">
          <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar Autores" href="{{ route('autores.create') }}">
            <i class="fa fa-plus"></i>
          </a>
        </div>
      </div>
      @if (sizeof($autores) > 0)
  
      <tr>
        <th scope="col">Acciones</th>
        <th scope="col">#</th>
        <th scope="col">Nombres</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Sexo</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($autores as $autor)
      <tr>
        <td class="text-center" width="20%">
          <a href="{{ route('autores.show', $autor) }}" class="btn btn-primary btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Ver autor">
            <i class="fa fa-book fa-fw text-white"></i></a>
          </a>
          <a href="{{ route('autores.edit', $autor) }}" class="btn btn-success btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Editar autor">
            <i class="fa fa-pencil fa-fw text-white"></i></a>
          </a>
          <form action="{{ route('autores.destroy', $autor) }}" method="POST" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button id="delete" name="delete" type="submit" class="btn btn-danger btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Eliminar autor" onclick="return confirm('¿Estás seguro de eliminar?')">
              <i class="fa fa-trash-o fa-fw"></i>
            </button>
          </form>
        </td>
        <td scope="row">{{ $autor->cod_autor }}</td>
        <td scope="row">{{ $autor->nombres }}</td>
        <td scope="row">{{ $autor->apellidos }}</td>
        <td scope="row">{{ $autor->cod_sexo }}</td>
      </tr>
      @endforeach
    </tbody>
    @else

    <div>
      <p>No se encontraron resultados</p>
    </div>

    @endif
  </table>
</div>
@endsection