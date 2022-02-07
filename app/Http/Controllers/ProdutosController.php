<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Categoria;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index(Request $request)
    {
        if(!empty($request->search) && !is_null($request->search)) {
            $produtos = Produto::where('nome', 'like', '%'.$request->search.'%')->get();
        } else {
            $produtos = Produto::all();
        }

        return view('produtos.index', compact('produtos'));
    }

    public function show($id)
    {
        $produto = Produto::find($id);

        return view('produtos.show', compact('produto'));
    }

    public function create()
    {
        $categorias = Categoria::all();

        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $produto = new Produto();

        $produto->nome = $request->nome;
        $produto->valor = $request->valor;
                
        if($request->hasFile('imagem')) {

            $imagemRequest = $request->imagem;
            $extensao = $imagemRequest->extension(); 
            $nomeImagem = md5($imagemRequest->getClientOriginalName() . strtotime('now')). "." . $extensao;

            $imagemRequest->move(public_path('img'), $nomeImagem);
            $produto->imagem = $nomeImagem;
        }

        $produto->save();
        $categorias = $request->categoria;
        $produto = Produto::find($produto->id);
        $produto->categorias()->sync($categorias);

        return redirect('/produtos');
    }

    public function editar($id)
    {
        $produto = Produto::find($id);
        $categorias = Categoria::all();

        $produtoCategorias = $produto->categorias->pluck('id')->toArray();

        return view('produtos.editar', compact('produto', 'categorias', 'produtoCategorias'));
    }

    public function editarProduto($id, Request $request)
    {
        $novoNome = $request->nome;
        $novoValor = $request->valor;
        
        $produto = Produto::find($id);

        $produto->nome = $novoNome;
        $produto->valor = $novoValor;

        if($request->hasFile('imagem')) {

            $imagemRequest = $request->imagem;
            $extensao = $imagemRequest->extension(); 
            $nomeImagem = md5($imagemRequest->getClientOriginalName() . strtotime('now')). "." . $extensao;

            $imagemRequest->move(public_path('img'), $nomeImagem);
            $produto->imagem = $nomeImagem;
        }

        $produto->categorias()->detach();

        $produto->save();
        $categorias = $request->categoria;
        $produto = Produto::find($produto->id);
        $produto->categorias()->sync($categorias);

        return redirect('/produtos');
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->categorias()->detach();
        $produto->delete();

        return redirect('/produtos');
    }
}
