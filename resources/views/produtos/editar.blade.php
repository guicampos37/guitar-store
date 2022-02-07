@extends('layout')

@section('title')
    Editar Produto | Guitar Store
@endsection

@section('conteudo')
{{-- h1 da Página --}}

<div class="jumbotron mb-4 bg col-md-4 offset-md-3">
    <h1>Editar Produto</h1>
</div>

<div class="row">
    <div class="col-md-6 offset-md-3">
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

            @foreach($categorias as $categoria)
                <div class="form-check form-control-lg form-check-inline mb-4 mt-3 custom-checkbox">
                    <input class="form-check-input" name="categoria[]" type="checkbox" value="{{ $categoria->id }}" id=""
                    @if(in_array($categoria->id, $produtoCategorias))
                        {{ 'checked' }}
                    @endif>
                    <label class="form-check-label" for="">{{ strToUpper($categoria->nome) }}</label>
                </div>
            @endforeach

            <div class="form-group mb-4">
                <label for="imagem">Selecione uma imagem do seu produto</label>
                <input type="file" name="imagem" class="form-control-file" id="imagem" value="{{ $produto->imagem }}">
            </div>

            <button type="submit" class="btn btn-danger">Enviar</button>
        </form>
    </div>
</div>
@endsection