@extends('layout')

@section('title') 
    Produtos | Guitar Store 
@endsection

@section('navbar')
    <div class="collapse navbar-collapse w-25" id="navbarSupportedContent">
        <form action="/produtos" method="get" class="d-flex w-100 my-2 my-lg-0">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
@endsection

@section('cabecalho')
    Produtos
@endsection

@section('conteudo')
    <a class="btn btn-danger ml-5" href="/produtos/criar">Adicionar</a>

    <div class="d-flex flex-row flex-wrap bd-highlight mt-5 w-100 justify-content-center">
        @foreach($produtos as $produto) 
            <div class="d-flex flex-row mt-5 mr-5 border border-danger text-center" style="width: 20%">
                <div class="">
                    <span class="bd-highlight p-2"><h1>{{ $produto->nome }}</h1></span>
                    <img class="w-50 mt-4 mb-4" src="img/{{ $produto->imagem }}" alt="">
                    <span class="p-2"><h1>R$ {{ $produto->valor }}</h1></span>
                    <div class="d-flex justify-content-center mb-3">
                        <a class="btn btn-warning mr-1" href="/produtos/{{ $produto->id }}/editar">Editar</a>
                        <form action="/produtos/{{ $produto->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger ml-1" href="/produtos/{{ $produto->id }}">Deletar</button>
                        </form>    
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection