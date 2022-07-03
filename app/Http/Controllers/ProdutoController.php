<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Validator;

class ProdutoController extends Controller
{
    public function addProduct(Request $req){

        $validator = Validator::make($req->all(),[
            'preco'=>'required|numeric',
            'nome'=>'required',
            'descrição'=>'required',
            'imagem'=>'required',
            'estoque_minimo'=>'required|numeric',
            'estoque_maximo'=>'required|numeric',
            'qtd_estoque'=>'required|numeric'
        ]);

        if($validator->fails()){

            return ["erro"=>$validator->messages()];

        }else {
            $product = new Produto;
            $product->preco = $req->input('preco');
            $product->nome = $req->input('nome');
            $product->descrição = $req->input('descrição');
            $product->imagem = $req->file('imagem')->store('imagem', 'public');
            $product->estoque_minimo = $req->input('estoque_minimo');
            $product->estoque_maximo = $req->input('estoque_maximo');
            $product->qtd_estoque = $req->input('qtd_estoque');
            $product->save();
        
            return $product;
        }            
    }

    public function listProduct(){
        return Produto::all();
    }

    public function deleteProduct($id){
        $result = Produto::where('id',$id)->delete();
        if($result){
            return ["result"=>"Produto excluido"];
        }
        else{
            return ["result"=>"Produto não localizado"];
        }
    }

    public function getProduct($id){
        return Produto::find($id);
    }

    public function updateProduct($id, Request $req){
        $product = Produto::find($id);
        $product->preco = $req->input('preco');
        $product->nome = $req->input('nome');
        $product->descrição = $req->input('descrição');
        $product->estoque_minimo = $req->input('estoque_minimo');
        $product->estoque_maximo = $req->input('estoque_maximo');
        $product->qtd_estoque = $req->input('qtd_estoque');
        if ($req->file('imagem'))
        {
            $product->imagem=$req->file('imagem')->store('imagem', 'public');
        }
        $product->save();

        return $product;
    }

    public function search($key){
    
        return Produto::where('nome','Like',"%$key%")->orWhere('descrição', 'Like',"%$key%")->get();
    }










    public function cadastra(){
        $produtos = Produto::all();

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
