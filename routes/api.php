<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ItensController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register',[UserController::class, 'register']);
Route::post('login',[UserController::class, 'login']);

Route::post('addProduct',[ProdutoController::class, 'addProduct']);
Route::get('listProduct',[ProdutoController::class, 'listProduct']);
Route::delete('deleteProduct/{id}',[ProdutoController::class, 'deleteProduct']);
Route::post('updateProduct/{id}',[ProdutoController::class, 'UpdateProduct']);
Route::get('getProduct/{id}',[ProdutoController::class, 'getProduct']);
Route::get('search/{id}',[ProdutoController::class, 'search']);
Route::get('searchProduto/{id}',[ProdutoController::class, 'searchProduto']);

Route::post('registerEnd',[EnderecoController::class, 'registerEnd']);

Route::post('registerPedido',[PedidoController::class, 'registerPedido']);
Route::get('searchPedido/{id}',[PedidoController::class, 'searchPedido']);

Route::post('registerItens',[ItensController::class, 'registerItens']);
Route::get('searchItens/{id}',[ItensController::class, 'searchItens']);