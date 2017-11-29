<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePontesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pontes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome_ponte')->unique();
            $table->integer('ano_construcao');
            $table->decimal('lat_inicio', 14,7)->nullable();
            $table->decimal('lng_inicio', 14,7)->nullable();
            $table->decimal('lat_fim', 14,7)->nullable();
            $table->decimal('lng_fim', 14,7)->nullable();
            $table->string('imagem')->nullable();
            $table->string('tipo_obstaculo')->nullable();
            $table->string('local_obstaculo')->nullable();
            $table->string('nome_obstaculo')->nullable();
            $table->integer('cadeia')->nullable();
            $table->double('passeio')->nullable();
            $table->string('tipo_material')->nullable();
            $table->string('superficie_corrida')->nullable();
            $table->string('juntas')->nullable();
            $table->string('rolamento')->nullable();
            $table->string('barreira')->nullable();
            $table->double('comprimento_extensao')->nullable();
            $table->integer('nr_link')->nullable();
            $table->boolean('visivel')->default(false);
            $table->string('estado_ponte')->default('');
            $table->integer('distrito_id')->unsigned();
            $table->foreign('distrito_id')->references('id')->on('distritos');

            $table->integer('tipo_id')->unsigned();
            $table->foreign('tipo_id')->references('id')->on('tipos');

            $table->integer('estrada_id')->unsigned();
            $table->foreign('estrada_id')->references('id')->on('estradas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pontes');
    }
}
