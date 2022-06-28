<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itens;

class ItensController extends Controller
{
    //
    function registerItens (Request $req) {

        $itens = new Itens;
        $itens->pedido_id= $req->input('pedido_id');
        $itens->produto_id= $req->input('produto_id');
        $itens->qtd= $req->input('qtd');
        $itens->valor= $req->input('valor');
        $itens->save();


        return $itens;   
    }
}
