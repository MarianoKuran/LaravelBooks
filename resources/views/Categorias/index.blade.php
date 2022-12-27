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
          <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar Categorias" href="{{ route('categorias.create') }}">
            <i class="fa fa-plus"></i>
          </a>
        </div>
      </div>
      @if (count($categorias) > 0)
  
      <tr>
        <th scope="col">Acciones</th>
        <th scope="col">#</th>
        <th scope="col">Descripción</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($categorias as $categoria)
      <tr>
        <td class="text-center" width="20%">
          <a href="{{ route('categorias.show', $categoria) }}" class="btn btn-primary btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Ver categoria">
            <i class="fa fa-book fa-fw text-white"></i></a>
          </a>
          <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-success btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Editar Categoria">
            <i class="fa fa-pencil fa-fw text-white"></i></a>
          </a>
          <form action="{{ route('categorias.destroy', $categoria) }}" method="POST" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button id="delete" name="delete" type="submit" class="btn btn-danger btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Eliminar Categoria" onclick="return confirm('¿Estás seguro de eliminar?')">
              <i class="fa fa-trash-o fa-fw"></i>
            </button>
          </form>
        </td>
        <td scope="row">{{ $categoria->cod_categoria }}</td>
        <td scope="row">{{ $categoria->descripcion }}</td>
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