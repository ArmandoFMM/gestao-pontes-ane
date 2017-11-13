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
            $table->text('comentario');
            $table->integer('inspector_id')->unsigned()->index();
            $table->foreign('inspector_id')->references('id')->on('inspectors');
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
