<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliaBidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilitador_bid', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre',15);
            $table->string('paterno',15);
            $table->string('materno',15)->nullable();
            $table->string('telefono',8)->nullable();
            $table->string('direccion',140)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('otras_referencias',250)->nullable();
            $table->timestamps();
        });

        Schema::create('distrito', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre',15)->unique()->index();;
            $table->string('descripcion',250)->nullable();
            $table->timestamps();
        });

        Schema::create('urbanizacion', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre',50)->unique()->index();
            $table->string('descripcion',250)->nullable();
            $table->timestamps();
        });

        Schema::create('via', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre',15)->unique()->index();
            $table->string('descripcion',250)->nullable();
            $table->timestamps();
        });

        Schema::create('alcantarillado', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('descripcion',250);
            $table->timestamps();
        });

        Schema::create('familia_bid', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('folio',15)->unique()->index();
            $table->double('latitud');
            $table->double('longitud');
            $table->integer('altura');
            $table->integer('facilitador_id')->index()->unsigned();
            $table->integer('distrito_id')->unsigned();
            $table->integer('urbanizacion_id')->index()->unsigned();
            $table->string('nombre_jefe_hogar',100);
            $table->string('telefono',8);
            $table->integer('via_id')->unsigned();
            $table->string('direccion',100);
            $table->string('numero_puerta',6);
            $table->string('otras_referencias',250);
            $table->date('fecha_encuesta_lb')->nullable();
            $table->integer('alcantarillado_id')->unsigned();
            $table->timestamps();
            $table->foreign('facilitador_id')->references('id')->on('facilitador_bid')->onDelete('cascade');
            $table->foreign('distrito_id')->references('id')->on('distrito')->onDelete('cascade');
            $table->foreign('urbanizacion_id')->references('id')->on('urbanizacion')->onDelete('cascade');
            $table->foreign('via_id')->references('id')->on('via')->onDelete('cascade');
            $table->foreign('alcantarillado_id')->references('id')->on('alcantarillado')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('familia_bid');
        Schema::drop('facilitador_bid');
        Schema::drop('distrito');
        Schema::drop('urbanizacion');
        Schema::drop('via');
        Schema::drop('alcantarillado');
    }
}
