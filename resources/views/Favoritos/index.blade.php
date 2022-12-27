@extends('main')

@section('content')

<div class="container">
  <div class="row mt-3">
    <h2>Tus Favoritos</h2>
    <div class="col-md-12">
      @foreach ( $librosFavoritos as $libroFavorito )
      @if ($libroFavorito->favoritos !== 0 )
      <div class="card mx-auto" style="width: 50%;">
        <div class="card-header">
          Libro
        </div>
        <div class="card-body text-center">
          <h5 class="card-title"><b>{{ $libroFavorito->titulo }}</b></h5>
          <img src="{{ $libroFavorito->portada }}" alt="portada del libro" style="width: 350px; height:420px;">
        </div>
      </div>
      @else
        <div>
          No tienes libros favoritos
        </div>
      @endif
      @endforeach
    </div>
  </div>
</div>

@endsection