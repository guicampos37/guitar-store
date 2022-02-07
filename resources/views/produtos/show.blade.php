@extends('layout')

@section('title')
    Produtos Infos | Guitar Store
@endsection

@push('js')
    <script src="{{ asset('js/produto.js') }}"></script>
@endpush

@section('conteudo')
    <div class="jumbotron mb-4 bg">
        <h1>{{ $produto->nome }}</h1>
    </div>

    <div class="d-flex flex-row mt-5 mr-5 border border-danger text-center" style="width: 20%">
        <div class="">
            <img class="w-50 mt-4 mb-4" src="{{ asset('img/' . $produto->imagem) }}" alt="">
            <span class="p-2"><h1>R$ {{ $produto->valor }}</h1></span>
            <input type="hidden" value="{{ $produto->id }}" id="produto_id">
        </div>
    </div>

    <button class="btn btn-secondary mt-5" id="botao-comentario" onclick="abrirComentario()">Fazer um comentario</button>

    <div class="form-group w-50 h-50 mt-5" hidden id="campo-comentario">
        <textarea class="form-control" name="valor" id="comentario" rows="3"></textarea>
        <button class="btn btn-secondary mt-2" onclick="comentar({{ $produto->id }})">Enviar</button>
        <button class="btn btn-danger mt-2" onclick="cancelarComentario()">Cancelar</button>
        @csrf
    </div>

    <ul id="lista-comentarios">
        @foreach($produto->comentarios as $comentario)
            <li>{{ $comentario->valor }}</li>
        @endforeach
    </ul>
@endsection