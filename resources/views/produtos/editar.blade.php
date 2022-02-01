@extends('layout2')

@section('title')
    Editar Produto | Guitar Store
@endsection

@section('cabecalho')
    Editar Produto
@endsection

@section('conteudo')

<div class="container">
    <form action="/produtos/{{ $produto->id }}/editar" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control"- id="nome" value="{{ $produto->nome }}">
        </div>

        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="text" name="valor" class="form-control" id="valor" value="{{ $produto->valor }}">
        </div>

        {{-- <div class="form-check form-control-lg form-check-inline mb-4 mt-3 custom-checkbox">
            <input class="form-check-input" type="checkbox" value="" id="">
            <label class="form-check-label" for="">Categoria 1</label>
        </div> --}}

        <div class="form-group mb-4">
            <label for="imagem">Selecione uma imagem do seu produto</label>
            <input type="file" name="imagem" class="form-control-file" id="imagem" value="{{ $produto->imagem }}">
        </div>

        <button type="submit" class="btn btn-danger">Enviar</button>
    </form>
</div>
@endsection