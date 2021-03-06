<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nome', 60);
            $table->string('cpf', 14);
            $table->string('email', 60);
            $table->string('senha', 99);
            $table->date('datanascimento');
            $table->string('telefone', 20);
            $table->string('tipousuario', 10)->nullable();

            $table->unique(["email"], 'email_UNIQUE');

            $table->unique(["cpf"], 'cpf_UNIQUE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}