@extends('main')

@section('content')
<div class="table-responsive mt-4">
  @if (session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
  </div>
  @endif
  <table class="table table-hover">
    <thead>
      <div class="col-md-12">
        <div class="pull-right">
          <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar Idioma" href="{{ route('idiomas.create') }}">
            <i class="fa fa-plus"></i>
          </a>
        </div>
      </div>
      @if (count($idiomas) > 0)

      <tr>
        <th scope="col">Acciones</th>
        <th scope="col">#</th>
        <th scope="col">Descripción</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($idiomas as $idioma)
      <tr>
        <td class="text-center" width="20%">
          <a href="{{ route('idiomas.show', $idioma) }}" class="btn btn-primary btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Ver Idioma">
            <i class="fa fa-book fa-fw text-white"></i></a>
          </a>
          <a href="{{ route('idiomas.edit', $idioma) }}" class="btn btn-success btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Editar Idioma">
            <i class="fa fa-pencil fa-fw text-white"></i></a>
          </a>
          <form action="{{ route('idiomas.destroy', $idioma) }}" method="POST" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button id="delete" name="delete" type="submit" class="btn btn-danger btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Eliminar Idioma" onclick="return confirm('¿Estás seguro de eliminar?')">
              <i class="fa fa-trash-o fa-fw"></i>
            </button>
          </form>
        </td>
        <td scope="row">{{ $idioma->cod_idioma }}</td>
        <td scope="row">{{ $idioma->descripcion }}</td>
      </tr>
      @endforeach
      @else
      <div class="mt-5">
        No se encontraron resultados
      </div>
      @endif
    </tbody>
  </table>
</div>
@endsection