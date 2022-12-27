<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LaraBooks</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <style>
    body {
      font-family: 'Nunito', sans-serif;
    }
  </style>
</head>

<body class="antialiased">
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ route('main') }}">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="{{ route('libros.index') }}">Libros</a>
          <a class="nav-link active" aria-current="page" href="{{ route('listarFavoritos') }}">Favoritos</a>
          <a class="nav-link" href="{{ route('autores.index') }}">Autores</a>
          <a class="nav-link" href="{{ route('categorias.index') }}">Categorias</a>
          <a class="nav-link" href="{{ route('idiomas.index') }}">Idiomas</a>
          <a class="nav-link" href="{{ route('sexos.index') }}">Sexo</a>
        </div>
      </div>
      <div class="input-group">
        <input class="form-control" id="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="button">Search</button>
      </div>
    </div>
  </nav>

  <main class="container">
    @yield('content')
  </main>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(document).ready(function() {

      $(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function() {
        $(".alert-dismissible").alert('close');
      });

      $('[data-toggle="tooltip"]').tooltip({
        trigger: 'hover'
      });


    });

    let input = document.getElementById('search')

    const busqueda = async (text) => {
      let result = await fetch('')
    };

    const onChange = (e) => {
      console.log(e.target.value)
    };
    input.addEventListener('keyup', onChange);
  </script>

</body>

</html>