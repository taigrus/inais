<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegranteBidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      Schema::create('genero', function (Blueprint $table) {
          $table->increments('id')->unsigned();
          $table->string('descripcion',15);
          $table->timestamps();
      });

        Schema::create('integrantes_familia_bid', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('familia_id')->index()->unsigned();
            $table->integer('integrante_id_csra')->index()->unsigned();
            $table->unique(array('familia_id', 'integrante_id'));
            $table->string('nombre',40);
            $table->string('paterno',40);
            $table->string('materno',40);
            $table->date('fecha_nacimiento');
            $table->integer('genero_id')->unsigned();
            $table->timestamps();
            $table->foreign('familia_id')->references('id')->on('familia_bid')->onDelete('cascade');
            $table->foreign('genero_id')->references('id')->on('genero')->onDelete('cascade');
        });
    }





    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('integrante_familia_bid');
        Schema::drop('genero');
    }
}
