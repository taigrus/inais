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

        Schema::create('pais', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre',25)->unique()->index();;
            $table->string('descripcion',250)->nullable();
            $table->timestamps();
        });

        Schema::create('departamento', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre',25)->unique()->index();;
            $table->string('descripcion',250)->nullable();
            $table->integer('pais_id')->unsigned();
            $table->foreign('pais_id')->references('id')->on('pais')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('provincia', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre',50)->unique()->index();;
            $table->string('descripcion',250)->nullable();
            $table->integer('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamento')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('municipio', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre',50)->unique()->index();;
            $table->string('descripcion',250)->nullable();
            $table->integer('provincia_id')->unsigned();
            $table->foreign('provincia_id')->references('id')->on('provincia')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('poblacion', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre',50)->unique()->index();;
            $table->string('descripcion',250)->nullable();
            $table->integer('municipio_id')->unsigned();
            $table->foreign('municipio_id')->references('id')->on('municipio')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('distrito', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre',50)->unique()->index();;
            $table->string('descripcion',250)->nullable();
            $table->integer('poblacion_id')->unsigned();
            $table->foreign('poblacion_id')->references('id')->on('poblacion')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('urbanizacion', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nombre',50)->unique()->index();
            $table->string('descripcion',250)->nullable();
            $table->integer('distrito_id')->unsigned();
            $table->foreign('distrito_id')->references('id')->on('distrito')->onDelete('cascade');
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
            $table->integer('facilitador_id')->index()->unsigned();
            $table->integer('urbanizacion_id')->index()->unsigned();
            $table->string('nombre_jefe_hogar',100);
            $table->string('telefono',8);
            $table->integer('via_id')->unsigned();
            $table->string('direccion',100);
            $table->string('numero_puerta',6);
            $table->string('otras_referencias',250)->nullable();
            $table->date('fecha_encuesta_lb')->nullable();
            $table->integer('alcantarillado_id')->unsigned();
            $table->double('latitud');
            $table->double('longitud');
            $table->integer('altura');
            $table->timestamps();
            $table->foreign('facilitador_id')->references('id')->on('facilitador_bid')->onDelete('cascade');
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
        Schema::drop('urbanizacion');
        Schema::drop('distrito');
        Schema::drop('poblacion');
        Schema::drop('municipio');
        Schema::drop('provincia');
        Schema::drop('departamento');
        Schema::drop('pais');
        Schema::drop('via');
        Schema::drop('alcantarillado');
    }
}
