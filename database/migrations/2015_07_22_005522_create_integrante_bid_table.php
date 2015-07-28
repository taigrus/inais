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
        Schema::create('integrante_familia_bid', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('familia_id')->index()->unsigned();
            $table->integer('integrante_id')->index()->unsigned();
            $table->unique(array('familia_id', 'integrante_id'));
            $table->string('nombre',40);
            $table->string('paterno',40);
            $table->string('materno',40);
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->timestamps();
            $table->foreign('familia_id')->references('id')->on('familia_bid')->onDelete('cascade');
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
    }
}
