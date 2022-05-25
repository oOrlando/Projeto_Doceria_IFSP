@extends('layouts/main')
@section('title','Cadastro de Produtos')
@section('content')


<div class="formulario"> 
    <h1>Cadastrar Produto</h1>      
    <form action="/produtos" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="form-group">
        <label for="preco">Preço do produto</label>
        <input name ="preco" type="number" step="any" class="form-control" id="preco" placeholder="Preço do Produto">
        </div>
        <div class="form-group">
        <label for="nome">Nome do produto</label>
        <input name ="nome" type="text" class="form-control" id="nome" placeholder="Nome do Produto">
        </div>
        <div class="form-group">
            <label for="descrição">Descreva o produto</label>
            <input name ="descrição" type="text-area" class="form-control" id="descrição" placeholder="Descrição do Produto">
        </div>
        <div class="form-group">
            <label for="imagem">Nome da imagem do produto</label>
            <input name ="imagem" type="file" class="form-control" id="imagem">
        </div>
        <div class="form-group">
            <label for="estoque_minimo">Estoque mínimo do produto</label>
            <input name ="estoque_minimo" type="number" class="form-control" id="estoque_minimo" placeholder="Estoque mínimo do Produto">
        </div>
        <div class="form-group">
            <label for="estoque_maximo">Estoque máximo do produto</label>
            <input name ="estoque_maximo" type="number" class="form-control" id="estoque_maximo" placeholder="Estoque Máximo do do Produto">
        </div>
        <div class="form-group">
            <label for="qtd_estoque">Estoque atual do produto</label>
            <input name ="qtd_estoque" type="number" class="form-control" id="qtd_estoque" placeholder="Estoque atual do Produto">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

@endsection