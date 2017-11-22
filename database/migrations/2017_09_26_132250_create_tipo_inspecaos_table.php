<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoInspecaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_inspecaos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designacao_tipo_inspecao')->unique();
            $table->text('descricao_tipo_inspecao');
            $table->integer('periodicidade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_inspecaos');
    }
}
