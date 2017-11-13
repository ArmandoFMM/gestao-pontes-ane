<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspecaoProblemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspecao_problema', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nivel_deterioracao');
            $table->integer('dimensao');
            $table->text('nota');
            $table->integer('inspecao_id')->unsigned()->index();
            $table->foreign('inspecao_id')->references('id')->on('inspecaos');
            $table->integer('problema_id')->unsigned()->index();
            $table->foreign('problema_id')->references('id')->on('problemas');
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
        Schema::dropIfExists('inspecao_problema');
    }
}
