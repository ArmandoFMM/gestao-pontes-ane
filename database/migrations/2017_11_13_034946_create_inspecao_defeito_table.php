<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspecaoDefeitoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defeito_grave_inspecao', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nivel')->nullable();
            $table->integer('inspecao_id')->unsigned()->index();
            $table->foreign('inspecao_id')->references('id')->on('inspecaos');
            $table->integer('defeito_grave_id')->unsigned()->index();
            $table->foreign('defeito_grave_id')->references('id')->on('defeito_graves');
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
        Schema::dropIfExists('inspecao_defeito');
    }
}
