<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Comentario;

class ComentariosController extends Controller
{
    public function store(Request $request)
    {
        $comentario = new Comentario();

        $comentario->valor = $request->valor;
        $comentario->produto_id = $request->produto_id;

        $comentario->save();

        return response()->json($comentario);
    }

    public function index($id)
    {
        $produto = Produto::find($id);

        return response()->json($produto->comentarios->pluck('valor')->toArray());
    }
}
