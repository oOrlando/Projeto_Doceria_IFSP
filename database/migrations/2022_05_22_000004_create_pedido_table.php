<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->date('datacompra');
            $table->double('valor');
            $table->unsignedInteger('usuario_id');
            $table->unsignedInteger('forma_pagamento_id');
            $table->string('situacao', 45);

            $table->index(["usuario_id"], 'fk_pedido_usuario1_idx');

            $table->index(["forma_pagamento_id"], 'fk_pedido_forma_pagamento1_idx');


            $table->foreign('usuario_id', 'fk_pedido_usuario1_idx')
                ->references('id')->on('usuario')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('forma_pagamento_id', 'fk_pedido_forma_pagamento1_idx')
                ->references('id')->on('forma_pagamento')
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
        Schema::dropIfExists('pedido');
    }
}