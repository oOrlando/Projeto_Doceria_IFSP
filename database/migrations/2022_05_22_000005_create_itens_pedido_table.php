<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensPedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_pedido', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('pedido_id');
            $table->unsignedInteger('produto_id');
            $table->unsignedInteger('qtd');
            $table->double('valor');

            $table->index(["pedido_id"], 'fk_pedido_has_produto_pedido1_idx');

            $table->index(["produto_id"], 'fk_itens_pedido_produto1_idx');


            $table->foreign('pedido_id', 'fk_pedido_has_produto_pedido1_idx')
                ->references('id')->on('pedido')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('produto_id', 'fk_itens_pedido_produto1_idx')
                ->references('id')->on('produto')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens_pedido');
    }
}