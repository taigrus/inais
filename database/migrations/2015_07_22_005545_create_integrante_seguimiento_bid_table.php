<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntegranteSeguimientoBidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrante_seguimiento_bid', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('familia_id')->index()->unsigned();
            $table->integer('rel_integrante_id')->index()->unsigned();
            //$table->unique(array('familia_id', 'integrante_id'));
            $table->date('fecha_visita');
            $table->time('hora_visita');
            $table->timestamps();
            $table->foreign('familia_id')->references('id')->on('familia_bid')->onDelete('cascade');
            $table->foreign('rel_integrante_id')->references('id')->on('integrante_familia_bid')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('integrante_seguimiento_bid');
    }
}
