<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('logradouro', 60);
            $table->string('numero', 7)->nullable();
            $table->string('complemento', 20)->nullable();
            $table->string('bairro', 45);
            $table->string('cidade', 45);
            $table->string('cep', 10);
            $table->string('tipoendereco', 15);
            $table->unsignedInteger('usuario_id');

            $table->index(["usuario_id"], 'fk_endereco_usuario1_idx');


            $table->foreign('usuario_id', 'fk_endereco_usuario1_idx')
                ->references('id')->on('usuario')
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
        Schema::dropIfExists('endereco');
    }
}