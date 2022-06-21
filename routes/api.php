<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdutoController;

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
Route::put('updateProduct/{id}',[ProdutoController::class, 'UpdateProduct']);
Route::get('getProduct/{id}',[ProdutoController::class, 'getProduct']);
Route::get('search/{id}',[ProdutoController::class, 'search']);