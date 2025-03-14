<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefeitoGravesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defeito_graves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('designacao_defeito')->unique();
            $table->text('descricao_defeito');
            $table->integer('tipo_defeito_id')->unsigned()->index();
            $table->foreign('tipo_defeito_id')->references('id')->on('tipo_defeitos');
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
        Schema::dropIfExists('defeito_graves');
    }
}
