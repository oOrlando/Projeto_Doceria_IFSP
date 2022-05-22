<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntregaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrega', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('situacao', 45)->nullable();
            $table->unsignedInteger('usuario_id');
            $table->unsignedInteger('endereco_id');
            $table->unsignedInteger('pedido_id');

            $table->index(["usuario_id"], 'fk_entrega_usuario1_idx');

            $table->index(["endereco_id"], 'fk_entrega_endereco1_idx');

            $table->index(["pedido_id"], 'fk_entrega_pedido1_idx');


            $table->foreign('usuario_id', 'fk_entrega_usuario1_idx')
                ->references('id')->on('usuario')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('endereco_id', 'fk_entrega_endereco1_idx')
                ->references('id')->on('endereco')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('pedido_id', 'fk_entrega_pedido1_idx')
                ->references('id')->on('pedido')
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
        Schema::dropIfExists('entrega');
    }
}