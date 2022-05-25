<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function cadastra(){
        return view('cad_produto');
    }

    public function inicial(){
        $produtos = Produto::all();

        return view('index',['produtos'=> $produtos]);
    }

    public function store(Request $request){
        $product = new Produto;

        $product->preco = $request->preco;
        $product->nome = $request->nome;
        $product->descrição = $request->descrição;
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImage = $request->imagem;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/produtos'), $imageName);
            $product->imagem = $imageName;
        }
        $product->estoque_minimo = $request->estoque_minimo;
        $product->estoque_maximo = $request->estoque_maximo;
        $product->qtd_estoque = $request->qtd_estoque;

        $product->save();

        return redirect('/');
    }
}
