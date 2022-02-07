<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/estilo.css') }}">
    @stack('css')
</head>
<body class="bg text-danger">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand h1 text-danger" href="{{ route('index_produtos')}}"><h1>Guitar Store</h1></a>
        </div>

        @yield('nav')
    </nav>

    <div class="container-fluid">
        {{-- Conteúdo da Página --}}
        @yield('conteudo')
    </div>

    @stack('js')
</body>
</html>