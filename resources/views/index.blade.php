@extends('layouts/main')
@section('title','Doceria')
@section('content')
    <nav class="navbar navbar-light navbar-expand-md py-3" style="align-items: center;">
        <div class="container">
            <section class="py-4 py-xl-5">
                <div class="container">
                    <div class="bg-dark border rounded border-0 border-dark overflow-hidden" style="margin-bottom: 15px;">
                        <div class="row g-0">
                            <div class="col-md-6">
                                <div class="text-white p-4 p-md-5">
                                    <h2 class="fw-bold text-white mb-3">Doceria IFSP</h2>
                                    <p class="mb-4">Doces,&nbsp;Doces,&nbsp;Doces,&nbsp;Doces,&nbsp;Doces,&nbsp;Doces,&nbsp;Doces,&nbsp;Doces.</p>
                                    <p class="mb-4">Doces,&nbsp;Doces,&nbsp;Doces,&nbsp;Doces,&nbsp;Doces,&nbsp;Doces,&nbsp;Doces,&nbsp;Doces.</p>
                                    <p class="mb-4">Doces,&nbsp;Doces,&nbsp;Doces,&nbsp;Doces,&nbsp;Doces,&nbsp;Doces,&nbsp;Doces,&nbsp;Doces.</p>
                                </div>
                            </div>
                            <div class="col-md-6 order-first order-md-last" style="min-height: 250px;"><img class="w-100 h-100 fit-cover" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </nav>
    <div class="d-flex flex-row justify-content-around flex-wrap">
        @foreach ($produtos as $produtos)      
            <div class="d-flex flex-column" style="padding: 3px;">
                <img src="img/produtos/{{$produtos->imagem}}"style="width: 242px;height: 178px;padding: 3px;">
                <label class="form-label align-self-center">{{$produtos->nome}}</label>
                <label class="form-label align-self-center">R$ {{$produtos->preco}}</label>
                <button class="btn btn-primary" type="button">Adicionar no Carrinho</button>
            </div>
        @endforeach
    </div>
@endsection
