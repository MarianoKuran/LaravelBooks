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
          <a class="btn btn-primary shadow-none" data-toggle="tooltip" data-placement="top" title="Agregar Libro" href="{{ route('libros.create') }}">
            <i class="fa fa-plus"></i>
          </a>
        </div>
      </div>
      @if (count($libros) > 0)

      <tr>
        <th scope="col">Acciones</th>
        <th scope="col">#</th>
        <th scope="col">Titulo</th>
        <th scope="col">Descripcion</th>
        <th scope="col">Fecha de publicacion</th>
        <th scope="col">Idioma</th>
        <th scope="col">Categoria</th>
        <th scope="col">Autor</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($libros as $libro)
      <tr>
        <td class="text-center" width="20%">
          <form action="{{ route('añadirFavorito', $libro->cod_libro) }}" method="POST" class="d-inline-block">
            @csrf
            @method('PUT')
            <button id="favorito" name="favorito" type="submit" class="btn {{ $libro->favoritos != 0 ? 'btn-white' : 'btn-danger' }} btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Añadir a favoritos">
              <i class="fa fa-heart fa-fw {{ $libro->favoritos != 0 ? 'text-danger' : 'text-white' }}"></i>
            </button>
          </form>
          <a href="{{ route('libros.show', $libro) }}" class="btn btn-primary btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Ver Libro">
            <i class="fa fa-book fa-fw text-white"></i></a>
          </a>
          <a href="{{ route('libros.edit', $libro) }}" class="btn btn-success btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Editar Libro">
            <i class="fa fa-pencil fa-fw text-white"></i></a>
          </a>
          <form action="{{ route('libros.destroy', $libro) }}" method="POST" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button id="delete" name="delete" type="submit" class="btn btn-danger btn-sm shadow-none" data-toggle="tooltip" data-placement="top" title="Eliminar Libro" onclick="return confirm('¿Estás seguro de eliminar?')">
              <i class="fa fa-trash-o fa-fw"></i>
            </button>
          </form>
        </td>
        <td scope="row">{{ $libro->cod_libro }}</td>
        <td scope="row">{{ $libro->titulo }}</td>
        <td scope="row">{{ $libro->descripcion }}</td>
        <td scope="row">{{ $libro->fecha_de_publicacion }}</td>
        <td scope="row">{{ $libro->idioma->descripcion }}</td>
        <td scope="row">{{ $libro->categorias[0]->descripcion }}</td>
        <td scope="row">{{ $libro->autores[0]->nombre_completo }}</td>
      </tr>
      @endforeach
    </tbody>
    @else

    <div class="mt-5">
      <p>No se encontraron resultados</p>
    </div>

    @endif
  </table>
</div>

<script>
  let users = [];
  let variable =  
const listUsers = () => {
  $.ajax({
    type: "GET",
    url: `libros/${}`,
    contentType: "application/json", //indicamos que el contenido esperado es de tipo JSON
    async: true,
    beforeSend: function () {
      console.log("Antes de la peticion ");
    },
    success: function (data) {
      users = data;
    },
    complete: function () {
      console.log(`Solicitud completa: ${users.length} usuarios listados`);
    },
    error: function (error) {
      console.log(error);
    },
  });
};

listUsers();
</script>
@endsection