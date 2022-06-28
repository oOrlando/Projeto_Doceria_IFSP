<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoController extends Controller
{   
    //
    function registerPedido (Request $req) {

        $ped = new Pedido;
        $ped->datacompra= $req->input('datacompra');
        $ped->valor= $req->input('valor');
        $ped->situacao= $req->input('situacao');
        $ped->usuario_id= $req->input('usuario_id');
        $ped->forma_pagamento_id= $req->input('forma_pagamento_id');
        $ped->save();


        return $ped;   
    }
}
