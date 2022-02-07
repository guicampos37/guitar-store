@extends('layout')

@section('title')
    Criar Produto | Guitar Store
@endsection

@section('conteudo')

{{-- h1 da Página --}}

<div class="jumbotron mb-4 bg col-md-4 offset-md-3">
    <h1>Adicionar Produto</h1>
</div>

<div class="col-md-6 offset-md-3">
    <form action="/produtos/criar" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control"- id="nome">
        </div>

        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="text" name="valor" class="form-control" id="valor">
        </div>

        @foreach($categorias as $categoria)
            <div class="form-check form-control-lg form-check-inline mb-4 mt-3 custom-checkbox">
                <input class="form-check-input" name="categoria[]" type="checkbox" value="{{ $categoria->id }}" id="">
                <label class="form-check-label" for="">{{ strToUpper($categoria->nome )}}</label>
            </div>
        @endforeach

        <div class="form-group mb-4">
            <label for="imagem">Selecione uma imagem do seu produto</label>
            <input type="file" name="imagem" class="form-control-file" id="imagem">
        </div>

        <button type="submit" class="btn btn-danger">Enviar</button>
    </form>
</div>
@endsection