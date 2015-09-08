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
        Schema::create('integrantes_seguimiento_bid', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->smallInteger('integrante_id')->index()->unsigned();
            $table->date('fecha_visita');
            $table->smallInteger('hora__inicio_visita')->unsigned();
            $table->smallInteger('minuto_inicio_visita')->unsigned();
            $table->smallInteger('ruta_id')->unsigned();
            $table->smallInteger('visita_id')->unsigned();
            $table->boolean('reforzamiento');
            $table->smallInteger('estado_programa_id')->unsigned();
            $table->date('fecha_recontacto_1')->nullable();
            $table->date('fecha_recontacto_2')->nullable();
            $table->date('fecha_recontacto_3')->nullable();
            $table->smallInteger('numero_recontactos_extra')->unsigned();
            $table->boolean('madre_presente_al_inicio');
            $table->boolean('padre_presente_al_inicio');
            $table->boolean('hermanos_presente_al_inicio');
            $table->boolean('abuelos_presente_al_inicio');
            $table->boolean('otros_del_hogar_presentes_al_inicio');
            $table->boolean('otros_no_del_hogar_presentes_al_inicio');
            $table->date('fecha_ultimo_ccd');
            $table->smallInteger('peso')->unsigned();
            $table->smallInteger('talla')->unsigned();
            $table->smallInteger('estado_talla_edad_id')->unsigned();
            $table->smallInteger('estado_peso_talla_id')->unsigned();
            $table->boolean('cumplio_compromiso_alimentacion')->unsigned();
            $table->smallInteger('compromiso_alimentacion_id')->unsigned();
            $table->boolean('cumplio_compromiso_estimulacion')->unsigned();
            $table->smallInteger('compromiso_estimulacion_id')->unsigned();
            $table->boolean('cumplio_compromiso_higiene')->unsigned();
            $table->smallInteger('compromiso_higiene_id')->unsigned();
            //aca me quede

            $table->timestamps();
            $table->foreign('integrante_id')->references('id')->on('integrantes_familia_bid')->onDelete('cascade');
            $table->foreign('ruta_id')->references('id')->on('rutas_bid')->onDelete('cascade');
            $table->foreign('visita_id')->references('id')->on('visitas_bid')->onDelete('cascade');
            $table->foreign('estado_programa_id')->references('id')->on('estados_en_programa_bid')->onDelete('cascade');
            $table->foreign('estado_talla_edad_id')->references('id')->on('estados_talla_edad')->onDelete('cascade');
            $table->foreign('estado_peso_talla_id')->references('id')->on('estados_peso_talla')->onDelete('cascade');
            $table->foreign('compromiso_alimentacion_id')->references('id')->on('compromisos_alimentacion_bid')->onDelete('cascade');
            $table->foreign('compromiso_estimulacion_id')->references('id')->on('compromisos_estimulacion_bid')->onDelete('cascade');
            $table->foreign('compromiso_higiene_id')->references('id')->on('compromisos_higiene_bid')->onDelete('cascade');
        });

        Schema::create('rutas_bid', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('descripcion',150);
            $table->timestamps();
        });

        Schema::create('visitas_bid', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('descripcion',100);
            $table->timestamps();
        });

        Schema::create('estados_en_programa_bid', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('descripcion',100);
            $table->timestamps();
        });

        Schema::create('estados_talla_edad', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('descripcion',150);
            $table->timestamps();
        });

        Schema::create('estados_peso_talla', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('descripcion',150);
            $table->timestamps();
        });

        Schema::create('compromisos_alimentacion_bid', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->smallInteger('ruta_id')->unsigned();
            $table->smallInteger('codigo')->unsigned();
            $table->string('descripcion',250);
            $table->timestamps();
        });

        Schema::create('compromisos_estimulacion_bid', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->smallInteger('ruta_id')->unsigned();
            $table->smallInteger('codigo')->unsigned();
            $table->string('descripcion',250);
            $table->timestamps();
        });

        Schema::create('compromisos_higiene_bid', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->smallInteger('ruta_id')->unsigned();
            $table->smallInteger('codigo')->unsigned();
            $table->string('descripcion',250);
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
        Schema::drop('integrante_seguimiento_bid');
    }
}
