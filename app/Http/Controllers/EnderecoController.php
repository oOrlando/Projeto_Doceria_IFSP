<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Endereco;

class EnderecoController extends Controller
{
    //
    function registerEnd (Request $req) {

        $end = new Endereco;
        $end->logradouro= $req->input('logradouro');
        $end->numero= $req->input('numero');
        $end->complemento= $req->input('complemento');
        $end->bairro= $req->input('bairro');
        $end->cidade= $req->input('cidade');
        $end->cep= $req->input('cep');
        $end->tipoendereco= $req->input('tipoendereco');
        $end->usuario_id= $req->input('usuario_id');
        $end->save();


        return $end;   
    }
}
