<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspecaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspecaos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('data');
            $table->time('hora')->nullable();
            $table->text('comentario')->nullable();
            $table->boolean('publicada')->default(false);
            $table->boolean('realizada')->default(false);
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('ponte_id')->unsigned()->index();
            $table->foreign('ponte_id')->references('id')->on('pontes');
            $table->integer('tipo_inspecao_id')->unsigned()->index();
            $table->foreign('tipo_inspecao_id')->references('id')->on('tipo_inspecaos');
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
        Schema::dropIfExists('inspecaos');
    }
}
