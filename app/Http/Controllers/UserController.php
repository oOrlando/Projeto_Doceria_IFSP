<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function register (Request $req) {

        $user = new User;
        $user->nome= $req->input('nome');
        $user->cpf= $req->input('cpf');
        $user->email= $req->input('email');
        $user->senha= Hash::make($req->input('senha'));
        $user->datanascimento= $req->input('datanascimento');
        $user->sexo= $req->input('sexo');
        $user->tipousuario= "admin";
        $user->save();


        return $user;
    }
}
